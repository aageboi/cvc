<div class="container-fluid" id="content">
    <?php $this->load->view('user/sidebar') ?>
    <div id="main" style="margin-left: 200px;">
        <div class="container-fluid">
            <div class="page-header"></div>
            <?php $this->load->view('breadcrumbs') ?>
            <div class="row-fluid">
                <!-- s: content -->
                <?php $this->load->view((isset($content) ? $content : "home")) ?>
                <!-- e:content -->
            </div>
        </div>
    </div>
</div>
