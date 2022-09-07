<div class="common">
  <div class="flag"></div>

  <div class="content">

    <div class="e2-heading">
      <span class="admin-links admin-links-floating">
        <span class="e2-ajax-loading e2-ajax-loading_hidden">
          <span class="e2-svgi e2-svgi-heading"><?= _SVG ('spin') ?></span>
        </span>
      </span>
      <h2>
        <?php if (array_key_exists ('heading', $content)) { ?>
        <?= $content['heading'] ?>
        <?php } ?>
      </h2>
    </div>

    <div class="form-control">
      <?php _T ('message') ?>
    </div>

    <?php if ($content['form-install']['installation-possible?']) { ?>

      <?php _JS ('form-install') ?>

      <form
        class="form"
        id="form-install"
        method="post"
        action="<?= @$content['form-install']['form-action'] ?>"
        data-action-database-config="<?= $content['form-install']['form-check-db-config-action'] ?>"
        data-action-databases-list="<?= $content['form-install']['form-list-databases-action'] ?>"
      >
        <div class="form-inner">
        
          <div class="form-part">
            <div class="form-control">
                <p><?= _S ('gs--db-parameters')?>:</p>
            </div>
            
            <div class="form-control">
              <div class="form-label input-label">
                <label for="db-server"><?= _S ('ff--db-host')?></label>
              </div>
              <div class="form-element">
                <input type="text"
                  name="db-server"
                  id="db-server"
                  class="text input-editable e2-livecheckable db-server-ok db-user-password-ok db-database-ok db-everything-ok width-3"
                  value="<?= @$content['form-install']['db-server'] ?>"
                />
              </div>
            </div>
            
            <div class="form-control">
              <div class="form-label input-label">
                <label for="db-user"><?= _S ('ff--db-username-and-password')?></label>
              </div>
              <div class="form-element">
                <input type="text"
                  name="db-user"
                  id="db-user"
                  class="text input-editable e2-livecheckable db-user-password-ok db-database-ok db-everything-ok width-2"
                  value="<?= @$content['form-install']['db-user'] ?>"
                />
              </div>
              <div class="form-element">
                <input type="text"
                  name="db-password"
                  id="db-password"
                  class="text input-editable e2-livecheckable db-user-password-ok db-database-ok db-everything-ok width-2"
                  value="<?= @$content['form-install']['db-password'] ?>"
                />
              </div>
            </div>
            
            <div class="form-control">
              <div class="form-label input-label">
                <label><?= _S ('ff--db-name') ?></label>
              </div>
              <div class="form-element">
                <div class="form-element-toggled">
                  <input type="text"
                    name="db-database"
                    id="db-database"
                    class="text input-editable e2-livecheckable db-database-ok db-everything-ok width-2"
                    value="<?= @$content['form-install']['db-database'] ?>"
                  />
                </div>
                <div class="form-element-toggled form-element-toggled_hidden">
                  <div class="e2-select-wrapper width-2">
                    <select
                      id="db-database-list"
                      name="db-database-selected"
                      class="e2-select e2-livecheckable e2-verified db-database-ok db-everything-ok"
                      size="1"
                    >
                    </select>
                    <span class="e2-select-icon"><span class="e2-svgi"><?= _SVG ('chevron-down') ?></span></span>
                  </div>
                </div>
                <div class="form-control-sublabel">
                  <?= _S ('gs--ask-hoster-how-to-create-db') ?>
                </div>
              </div>
            </div>
            
            <div class="form-control" id="db-database-message" style="display: none">
              <div class="width-3" id="db-database-message-text"></div>
            </div>
          </div>
        
          <div class="form-part">
            <div class="form-control">
              <p><?= _S ('gs--password-for-blog') ?>:</p>
            </div>
            
            <div class="form-control">
              <div class="form-element">
                <input type="text" class="text input-editable width-2" name="password" id="password"/>
              </div>
            </div>
            
            <div class="form-control">
              <div class="form-element">
                <button type="submit" id="submit-button" class="e2-button e2-submit-button">
                  <?= @$content['form-install']['submit-text'] ?>
                </button>
                <span class="e2-keyboard-shortcut"><?= _SHORTCUT ('submit') ?></span>
              </div>
            </div>
          </div>
        
        </div>
      </form>
    
    <?php } else { ?>
      <a class="e2-button e2-submit-button" href="<?= @$content['form-install']['retry-href'] ?>">
        <?= @$content['form-install']['retry-text'] ?>
      </a>
    <?php } ?>
  
  </div>
</div>