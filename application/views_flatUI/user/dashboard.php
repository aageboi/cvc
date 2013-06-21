<div class="row-fluid">
    <div class="span4">
      <div class="todo mrm">
        <div class="todo-search">
          <input class="todo-search-field" type="search" value="" placeholder="Search">
        </div>
        <ul>
          <li>
            <div class="todo-icon fui-new"></div>
            <div class="todo-content">
            <a href="<?= site_url('cv/new') ?>" class="none">
              <h3 class="todo-name">
                  Create New
              </h3>
            </a>
            </div>
          </li>

          <li>
            <div class="todo-icon fui-list"></div>
            <div class="todo-content">
            <a href="<?= site_url('cv') ?>" class="none">
              <h3 class="todo-name">
                Show my CV
              </h3>
            </a>
            </div>
          </li>

          <li>
            <div class="todo-icon fui-user"></div>
            <div class="todo-content">
            <a href="<?= site_url('user') ?>" class="none">
              <h3 class="todo-name">
                Profile
              </h3>
            </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="span8">
        <?php $this->load->view((isset($content) ? $content : "home")) ?>
    </div>
</div>
