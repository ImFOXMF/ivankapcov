const poly = {
  run(cb) {
    if (window.CSS && window.CSS.supports && window.CSS.supports('(--foo: red)')) {
      if (cb) cb()
      return
    }

    poly.cb = cb
    poly.ratifiedVars = {}
    poly.varsByBlock = {}
    poly.oldCSS = {}

    // start things off
    poly.findCSS()
    poly.updateCSS()
  },

  // find all the css blocks, save off the content, and look for variables
  findCSS() {
    const styleBlocks = document.querySelectorAll('style:not([id*="inserted"]), link[type="text/css"], link[rel="stylesheet"]')

    poly.processedStyles = styleBlocks.length

    // we need to track the order of the style/link elements when we save off the CSS, set a counter
    let counter = 1

    // loop through all CSS blocks looking for CSS variables being set
    ;[].forEach.call(styleBlocks, block => {
      let theCSS

      if (block.nodeName === 'STYLE') {
        theCSS = block.innerHTML
        poly.findSetters(theCSS, counter)
        poly.processedStyles--
      } else if (block.nodeName === 'LINK') {
        poly.getLink(block.getAttribute('href'), counter, (counter, request) => {
          const respCSS = request.responseText

          poly.findSetters(respCSS, counter)
          poly.oldCSS[counter] = respCSS
          poly.updateCSS()
          poly.processedStyles--

          if (!poly.processedStyles && poly.cb) {
            poly.cb()
          }
        })

        theCSS = ''
      }

      // save off the CSS to parse through again later.
      // the value may be empty for links that are waiting for their ajax return, but this will maintain the order
      poly.oldCSS[counter] = theCSS
      counter++
    })
  },

  // find all the "--variable: value" matches in a provided block of CSS and add them to the master list
  findSetters(theCSS, counter) {
    poly.varsByBlock[counter] = theCSS.match(/(?!var)--[a-zA-Z0-9\-]+:(\s?)(.+?)[;}]/gmi)
  },

  // run through all the CSS blocks to update the variables and then inject on the page
  updateCSS() {
    // first lets loop through all the variables to make sure later vars trump earlier vars
    poly.ratifySetters(poly.varsByBlock);

    // loop through the css blocks (styles and links)
    for (let id in poly.oldCSS) {
      const newCSS = poly.replaceGetters(poly.oldCSS[id], poly.ratifiedVars);

      // put it back into the page
      // first check to see if this block exists already
      if (document.querySelector('#inserted' + id)) {
        document.querySelector('#inserted' + id).innerHTML = newCSS;
      } else {
        const style = document.createElement('style');
        style.innerHTML = newCSS;
        style.id = 'inserted' + id;
        document.getElementsByTagName('head')[0].appendChild(style);
      }
    }
  },

  // parse a provided block of CSS looking for a provided list of variables and replace the --var-name with the correct value
  replaceGetters(curCSS, varList) {
    for (let theVar in varList) {
      // match the variable with the actual variable name
      const getterRegex = new RegExp('var\\(\\s*?' + theVar.trim() + '(\\)|,([\\s\\,\\w]*\\)))', 'g')
      curCSS = curCSS.replace(getterRegex, varList[theVar])
    }

    // now check for any getters that are left that have fallbacks
    const getterRegex2 = /var\(\s*?([^)^,\.]*)(?:[\s\,])*([^)\.]*)\)/g
    let matches = getterRegex2.exec(curCSS)

    while (matches) {
      // find the fallback within the getter
      curCSS = curCSS.replace(matches[0], matches[2])
      matches = getterRegex2.exec(curCSS)
    }

    return curCSS
  },

  // determine the css variable name value pair and track the latest
  ratifySetters(varList) {
    // loop through each block in order, to maintain order specificity
    for (let curBlock in varList) {
      // loop through each var in the block
      varList[curBlock].forEach(theVar => {
        theVar = theVar.replace(/[{;]/g, '')

        // split on the name value pair separator
        const [name, value] = theVar.split(/:\s*/)

        // put it in an object based on the varName
        // each time we do this it will override a previous use and so will always have the last set be the winner
        poly.ratifiedVars[name] = value
      })
    }
  },

  // get the CSS file
  getLink(url, counter, success) {
    const request = new XMLHttpRequest()

    request.open('GET', url, true)
    request.overrideMimeType('text/css')
    request.onload = () => {
      if (request.status >= 200 && request.status < 400) {
        success(counter, request, url)
      } else {
        // We reached our target server, but it returned an error
        console.warn('error was returned from:', url)
      }
    }
    request.onerror = () => {
      // There was a connection error of some sort
      console.warn('cant get css from:', url)
    }
    request.send()
  },
}

export default poly
