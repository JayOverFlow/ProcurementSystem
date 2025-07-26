<?= $this->extend('user-pages/supply/layout/sup-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Supply My Files</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <link href="<?= base_url('assets/src/assets/css/light/elements/custom-tree_view.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/elements/custom-tree_view.css') ?>" rel="stylesheet" type="text/css" />
    
    <link href="<?= base_url('assets/src/assets/css/light/pages/my-files.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/pages/my-files.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/src/assets/css/light/components/modal.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/src/assets/css/dark/components/modal.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div id="treeviewFStructure" class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <h4>My Files</h4>
            </div>                            
            <div class="widget-content widget-content-area">
                <div class="treeview-container">
                    <ul class="treeview folder-structure" id="treeviewFolderStructureEx">
                        <li class="tv-item">
                            <div class="tv-header" id="main">
                                <div class="tv-collapsible" data-bs-toggle="collapse" data-bs-target="#folderMainCollapse" aria-expanded="true" aria-controls="folderMainCollapse">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-folder" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2"></path>
                                        </svg>
                                    </div>
                                    <p class="title">Procurement</p>
                                </div>
                            </div>
                            <div id="folderMainCollapse" class="treeview-collapse collapse show" aria-labelledby="main" data-bs-parent="#treeviewFolderStructureEx">

                                <ul class="treeview" id="treeviewFolderStructureMainChild">
                                    <li class="tv-item">
                                        <div class="tv-header" id="folderMainChildHeadingOne">
                                            <div class="tv-collapsible" data-bs-toggle="collapse" data-bs-target="#folderMainChildOne" aria-expanded="true" aria-controls="folderMainChildOne">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-folder" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2"></path>
                                                    </svg>
                                                </div>
                                                <p class="title">Project Procurement Management Plan (PPMP)</p>
                                            </div>
                                        </div>
                                        <div id="folderMainChildOne" class="treeview-collapse collapse show" aria-labelledby="folderMainChildHeadingOne" data-bs-parent="#treeviewFolderStructureMainChild">

                                            <ul class="treeview" id="treeviewFolderCSSChild">
                                                <li class="tv-item">
                                                    <div class="tv-header" id="folderCSSChildHeadingOne">
                                                        <div class="tv-collapsible collapsed" data-bs-toggle="collapse" data-bs-target="#folderCSSChildOne" aria-expanded="false" aria-controls="folderCSSChildOne">
                                                            <div class="icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-folder" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2"></path>
                                                                </svg>
                                                            </div>
                                                            <p class="title">Modules</p>
                                                        </div>
                                                    </div>
                                                    <div id="folderCSSChildOne" class="treeview-collapse collapse" aria-labelledby="folderCSSChildHeadingOne" data-bs-parent="#treeviewFolderCSSChild">
                                                        <ul class="treeview" id="treeviewFolderModulesChild">
                                                            <li class="tv-item"> <span class="icon"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                             </svg> </span><p>style.module.css</p></li>
                                                        </ul>
                                                    </div>
                                                </li>
        
                                                <li class="tv-item"> <span class="icon"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                 </svg> </span> <p>style.css</p></li>
                                            </ul>
                                            
                                        </div>
                                    </li>
        
                                    <li class="tv-item">
                                        <div class="tv-header" id="folderMainChildHeadingTwo">
                                            <div class="tv-collapsible collapsed" data-bs-toggle="collapse" data-bs-target="#folderMainChildTwo" aria-expanded="false" aria-controls="folderMainChildTwo">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-folder" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2"></path>
                                                    </svg>
                                                </div>
                                                <p class="title">JS</p>
                                            </div>
                                        </div>
                                        <div id="folderMainChildTwo" class="treeview-collapse collapse" aria-labelledby="folderMainChildHeadingTwo" data-bs-parent="#treeviewFolderStructureMainChild">

                                            <ul class="treeview" id="treeviewBasicJSChild">
                                                <li class="tv-item"> <span class="icon"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                 </svg> </span><p>script.js</p></li>
                                            </ul>
                                            
                                        </div>
                                    </li>
        
                                    <li class="tv-item">
                                        <div class="tv-header" id="folderMainChildHeadingThree">
                                            <div class="tv-collapsible collapsed" data-bs-toggle="collapse" data-bs-target="#folderMainChildThree" aria-expanded="false" aria-controls="folderMainChildThree">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-folder" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2"></path>
                                                    </svg>
                                                </div>
                                                <p class="title">image</p>
                                            </div>
                                        </div>
                                        <div id="folderMainChildThree" class="treeview-collapse collapse" aria-labelledby="folderMainChildHeadingThree" data-bs-parent="#treeviewFolderStructureMainChild">
                                            <ul class="treeview" id="treeviewBasicImgChild">
                                                <li><li class="tv-item"> <span class="icon"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                    </svg> </span><p>profile.jpeg</p></li>
                                                <li><li class="tv-item"> <span class="icon"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                    </svg> </span><p>background.png</p></li>
                                                <li><li class="tv-item"> <span class="icon"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                                    </svg> </span><p>arrow.svg</p></li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li><li class="tv-item"> <span class="icon"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                 </svg> </span><p>index.html</p></li>
                                </ul>

                            </div>
                        </li>
                    </ul>
                </div>
                <div class="content-container">
                    
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script src="<?= base_url('assets/src/plugins/src/treeview/custom-jstree.js') ?>"></script>
<?= $this->endSection() ?>

