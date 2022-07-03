<?php include '../includes/header.php' ?>
<?php if (isset($_SESSION['userid'])) { ?>

    <!-- Begin page -->
    <div class="wrapper">

        <?php include '../includes/sidebar.php' ?>
        <!-- Begin page -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <?php include '../includes/topbar.php' ?>

                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                        <li class="breadcrumb-item active">Data Tables</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Data Tables</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Basic Data Table</h4>
                                    <p class="text-muted font-14">
                                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
                                        function:
                                        <code>$().DataTable();</code>. KeyTable provides Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned to individual
                                        cells, columns, rows or all cells.
                                    </p>

                                    <ul class="nav nav-tabs nav-bordered mb-3">
                                        <li class="nav-item">
                                            <a href="#basic-datatable-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Preview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#basic-datatable-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Code
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="basic-datatable-preview">
                                            <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="basic-datatable_length"><label class="form-label">Show <select name="basic-datatable_length" aria-controls="basic-datatable" class="form-select form-select-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> entries</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="basic-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="basic-datatable"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" aria-describedby="basic-datatable_info" style="position: relative; width: 1550px;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 258.8px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 379.8px;" aria-label="Position: activate to sort column ascending">Position</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 192.8px;" aria-label="Office: activate to sort column ascending">Office</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 99.8px;" aria-label="Age: activate to sort column ascending">Age</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 180.8px;" aria-label="Start date: activate to sort column ascending">Start date</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" style="width: 166.8px; display: none;" aria-label="Salary: activate to sort column ascending">Salary</th>
                                                                </tr>
                                                            </thead>


                                                            <tbody>

























































                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                                        <div style="position: absolute; height: 1px; width: 0px; overflow: hidden;"><input type="text" tabindex="0"></div>Airi Satou
                                                                    </td>
                                                                    <td>Accountant</td>
                                                                    <td style="">Tokyo</td>
                                                                    <td style="">33</td>
                                                                    <td style="">2008/11/28</td>
                                                                    <td style="display: none;">$162,700</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Angelica Ramos</td>
                                                                    <td>Chief Executive Officer (CEO)</td>
                                                                    <td style="">London</td>
                                                                    <td style="">47</td>
                                                                    <td style="">2009/10/09</td>
                                                                    <td style="display: none;">$1,200,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Ashton Cox</td>
                                                                    <td>Junior Technical Author</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">66</td>
                                                                    <td style="">2009/01/12</td>
                                                                    <td style="display: none;">$86,000</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Bradley Greer</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">41</td>
                                                                    <td style="">2012/10/13</td>
                                                                    <td style="display: none;">$132,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Brenden Wagner</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">28</td>
                                                                    <td style="">2011/06/07</td>
                                                                    <td style="display: none;">$206,850</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Brielle Williamson</td>
                                                                    <td>Integration Specialist</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">61</td>
                                                                    <td style="">2012/12/02</td>
                                                                    <td style="display: none;">$372,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Bruno Nash</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">38</td>
                                                                    <td style="">2011/05/03</td>
                                                                    <td style="display: none;">$163,500</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Caesar Vance</td>
                                                                    <td>Pre-Sales Support</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">21</td>
                                                                    <td style="">2011/12/12</td>
                                                                    <td style="display: none;">$106,450</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Cara Stevens</td>
                                                                    <td>Sales Assistant</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">46</td>
                                                                    <td style="">2011/12/06</td>
                                                                    <td style="display: none;">$145,600</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Cedric Kelly</td>
                                                                    <td>Senior Javascript Developer</td>
                                                                    <td style="">Edinburgh</td>
                                                                    <td style="">22</td>
                                                                    <td style="">2012/03/29</td>
                                                                    <td style="display: none;">$433,060</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="basic-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="basic-datatable_paginate">
                                                            <ul class="pagination pagination-rounded">
                                                                <li class="paginate_button page-item previous disabled" id="basic-datatable_previous"><a href="#" aria-controls="basic-datatable" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="basic-datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="basic-datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                                <li class="paginate_button page-item next" id="basic-datatable_next"><a href="#" aria-controls="basic-datatable" data-dt-idx="7" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="basic-datatable-code">
                                            <p>Please include following css file at <code>head</code> element</p>

                                            <pre>                                                    <span class="html escape hljs xml"><span class="hljs-comment">&lt;!-- Datatables css --&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">link</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"assets/css/vendor/dataTables.bootstrap5.css"</span> <span class="hljs-attr">rel</span>=<span class="hljs-string">"stylesheet"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text/css"</span> /&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">link</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"assets/css/vendor/responsive.bootstrap5.css"</span> <span class="hljs-attr">rel</span>=<span class="hljs-string">"stylesheet"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text/css"</span> /&gt;</span></span>
                                                </pre> <!-- end highlight-->

                                            <p>Make sure to include following js files at end of <code>body</code> element</p>

                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-comment">&lt;!-- Datatables js --&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/jquery.dataTables.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/dataTables.bootstrap5.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/dataTables.responsive.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/responsive.bootstrap5.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><br><span class="hljs-comment">&lt;!-- Datatable Init js --&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/pages/demo.datatable-init.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->

                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"basic-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table dt-responsive nowrap w-100"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br><br><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                        </div> <!-- end preview code-->
                                    </div> <!-- end tab-content-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="header-title">Buttons example</h4>
                                    <p class="text-muted font-14">
                                        The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page
                                        that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                    </p>

                                    <ul class="nav nav-tabs nav-bordered mb-3">
                                        <li class="nav-item">
                                            <a href="#buttons-table-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Preview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#buttons-table-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Code
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="buttons-table-preview">
                                            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dt-buttons btn-group flex-wrap"> <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Print</span></button> </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable-buttons"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" aria-describedby="datatable-buttons_info" style="width: 1550px;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 258.8px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 379.8px;" aria-label="Position: activate to sort column ascending">Position</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 192.8px;" aria-label="Office: activate to sort column ascending">Office</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 99.8px;" aria-label="Age: activate to sort column ascending">Age</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 180.8px;" aria-label="Start date: activate to sort column ascending">Start date</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 166.8px; display: none;" aria-label="Salary: activate to sort column ascending">Salary</th>
                                                                </tr>
                                                            </thead>


                                                            <tbody>

























































                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
                                                                    <td>Accountant</td>
                                                                    <td style="">Tokyo</td>
                                                                    <td style="">33</td>
                                                                    <td style="">2008/11/28</td>
                                                                    <td style="display: none;">$162,700</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Angelica Ramos</td>
                                                                    <td>Chief Executive Officer (CEO)</td>
                                                                    <td style="">London</td>
                                                                    <td style="">47</td>
                                                                    <td style="">2009/10/09</td>
                                                                    <td style="display: none;">$1,200,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Ashton Cox</td>
                                                                    <td>Junior Technical Author</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">66</td>
                                                                    <td style="">2009/01/12</td>
                                                                    <td style="display: none;">$86,000</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Bradley Greer</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">41</td>
                                                                    <td style="">2012/10/13</td>
                                                                    <td style="display: none;">$132,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Brenden Wagner</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">28</td>
                                                                    <td style="">2011/06/07</td>
                                                                    <td style="display: none;">$206,850</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Brielle Williamson</td>
                                                                    <td>Integration Specialist</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">61</td>
                                                                    <td style="">2012/12/02</td>
                                                                    <td style="display: none;">$372,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Bruno Nash</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">38</td>
                                                                    <td style="">2011/05/03</td>
                                                                    <td style="display: none;">$163,500</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Caesar Vance</td>
                                                                    <td>Pre-Sales Support</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">21</td>
                                                                    <td style="">2011/12/12</td>
                                                                    <td style="display: none;">$106,450</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Cara Stevens</td>
                                                                    <td>Sales Assistant</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">46</td>
                                                                    <td style="">2011/12/06</td>
                                                                    <td style="display: none;">$145,600</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Cedric Kelly</td>
                                                                    <td>Senior Javascript Developer</td>
                                                                    <td style="">Edinburgh</td>
                                                                    <td style="">22</td>
                                                                    <td style="">2012/03/29</td>
                                                                    <td style="display: none;">$433,060</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate">
                                                            <ul class="pagination pagination-rounded">
                                                                <li class="paginate_button page-item previous disabled" id="datatable-buttons_previous"><a href="#" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="datatable-buttons" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                                <li class="paginate_button page-item next" id="datatable-buttons_next"><a href="#" aria-controls="datatable-buttons" data-dt-idx="7" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="buttons-table-code">
                                            <p>Please include following css file at <code>head</code> element</p>

                                            <pre>                                                    <span class="html escape hljs xml"><span class="hljs-comment">&lt;!-- Datatables css --&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">link</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"assets/css/vendor/buttons.bootstrap5.css"</span> <span class="hljs-attr">rel</span>=<span class="hljs-string">"stylesheet"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text/css"</span> /&gt;</span></span>
                                                </pre> <!-- end highlight-->

                                            <p>Make sure to include following js files at end of <code>body</code> element</p>

                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-comment">&lt;!-- Datatables js --&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/dataTables.buttons.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/buttons.bootstrap5.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/buttons.html5.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/buttons.flash.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/buttons.print.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->

                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"datatable-buttons"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table table-striped dt-responsive nowrap w-100"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br><br><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                        </div> <!-- end preview code-->
                                    </div> <!-- end tab-content-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="header-title">Multi item selection</h4>
                                    <p class="text-muted font-14">
                                        This example shows the multi option. Note how a click on a row will toggle its selected state without effecting other rows,
                                        unlike the os and single options shown in other examples.
                                    </p>

                                    <ul class="nav nav-tabs nav-bordered mb-3">
                                        <li class="nav-item">
                                            <a href="#multi-item-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Preview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#multi-item-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Code
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="multi-item-preview">
                                            <div id="selection-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="selection-datatable_length"><label class="form-label">Show <select name="selection-datatable_length" aria-controls="selection-datatable" class="form-select form-select-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> entries</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="selection-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="selection-datatable"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="selection-datatable" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" aria-describedby="selection-datatable_info" style="width: 1550px;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 258.8px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 379.8px;" aria-label="Position: activate to sort column ascending">Position</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 192.8px;" aria-label="Office: activate to sort column ascending">Office</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 99.8px;" aria-label="Age: activate to sort column ascending">Age</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 180.8px;" aria-label="Start date: activate to sort column ascending">Start date</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="selection-datatable" rowspan="1" colspan="1" style="width: 166.8px; display: none;" aria-label="Salary: activate to sort column ascending">Salary</th>
                                                                </tr>
                                                            </thead>


                                                            <tbody>

























































                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
                                                                    <td>Accountant</td>
                                                                    <td style="">Tokyo</td>
                                                                    <td style="">33</td>
                                                                    <td style="">2008/11/28</td>
                                                                    <td style="display: none;">$162,700</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Angelica Ramos</td>
                                                                    <td>Chief Executive Officer (CEO)</td>
                                                                    <td style="">London</td>
                                                                    <td style="">47</td>
                                                                    <td style="">2009/10/09</td>
                                                                    <td style="display: none;">$1,200,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Ashton Cox</td>
                                                                    <td>Junior Technical Author</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">66</td>
                                                                    <td style="">2009/01/12</td>
                                                                    <td style="display: none;">$86,000</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Bradley Greer</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">41</td>
                                                                    <td style="">2012/10/13</td>
                                                                    <td style="display: none;">$132,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Brenden Wagner</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">28</td>
                                                                    <td style="">2011/06/07</td>
                                                                    <td style="display: none;">$206,850</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Brielle Williamson</td>
                                                                    <td>Integration Specialist</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">61</td>
                                                                    <td style="">2012/12/02</td>
                                                                    <td style="display: none;">$372,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Bruno Nash</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">38</td>
                                                                    <td style="">2011/05/03</td>
                                                                    <td style="display: none;">$163,500</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Caesar Vance</td>
                                                                    <td>Pre-Sales Support</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">21</td>
                                                                    <td style="">2011/12/12</td>
                                                                    <td style="display: none;">$106,450</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Cara Stevens</td>
                                                                    <td>Sales Assistant</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">46</td>
                                                                    <td style="">2011/12/06</td>
                                                                    <td style="display: none;">$145,600</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Cedric Kelly</td>
                                                                    <td>Senior Javascript Developer</td>
                                                                    <td style="">Edinburgh</td>
                                                                    <td style="">22</td>
                                                                    <td style="">2012/03/29</td>
                                                                    <td style="display: none;">$433,060</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="selection-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="selection-datatable_paginate">
                                                            <ul class="pagination pagination-rounded">
                                                                <li class="paginate_button page-item previous disabled" id="selection-datatable_previous"><a href="#" aria-controls="selection-datatable" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="selection-datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="selection-datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                                <li class="paginate_button page-item next" id="selection-datatable_next"><a href="#" aria-controls="selection-datatable" data-dt-idx="7" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="multi-item-code">
                                            <p>Please include following css file at <code>head</code> element</p>

                                            <pre>                                                    <span class="html escape hljs xml"><span class="hljs-comment">&lt;!-- Datatables css --&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">link</span> <span class="hljs-attr">href</span>=<span class="hljs-string">"assets/css/vendor/select.bootstrap5.css"</span> <span class="hljs-attr">rel</span>=<span class="hljs-string">"stylesheet"</span> <span class="hljs-attr">type</span>=<span class="hljs-string">"text/css"</span> /&gt;</span></span>
                                                </pre> <!-- end highlight-->

                                            <p>Make sure to include following js files at end of <code>body</code> element</p>

                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-comment">&lt;!-- Datatables js --&gt;</span><br><span class="hljs-tag">&lt;<span class="hljs-name">script</span> <span class="hljs-attr">src</span>=<span class="hljs-string">"assets/js/vendor/dataTables.select.min.js"</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"selection-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table dt-responsive nowrap w-100"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br><br><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                        </div> <!-- end preview code-->
                                    </div> <!-- end tab-content-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Alternative Pagination</h4>
                                    <p class="text-muted font-14">
                                        The default page control presented by DataTables (forward and backward buttons with up to 7 page numbers in-between)
                                        is fine for most situations, but there are cases where you may wish to customise the options presented to the end
                                        user.
                                    </p>

                                    <ul class="nav nav-tabs nav-bordered mb-3">
                                        <li class="nav-item">
                                            <a href="#alt-pagination-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Preview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#alt-pagination-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Code
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="alt-pagination-preview">
                                            <div id="alternative-page-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="alternative-page-datatable_length"><label class="form-label">Show <select name="alternative-page-datatable_length" aria-controls="alternative-page-datatable" class="form-select form-select-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> entries</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="alternative-page-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="alternative-page-datatable"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="alternative-page-datatable" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" aria-describedby="alternative-page-datatable_info" style="width: 1550px;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="alternative-page-datatable" rowspan="1" colspan="1" style="width: 258.8px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="alternative-page-datatable" rowspan="1" colspan="1" style="width: 379.8px;" aria-label="Position: activate to sort column ascending">Position</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="alternative-page-datatable" rowspan="1" colspan="1" style="width: 192.8px;" aria-label="Office: activate to sort column ascending">Office</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="alternative-page-datatable" rowspan="1" colspan="1" style="width: 99.8px;" aria-label="Age: activate to sort column ascending">Age</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="alternative-page-datatable" rowspan="1" colspan="1" style="width: 180.8px;" aria-label="Start date: activate to sort column ascending">Start date</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="alternative-page-datatable" rowspan="1" colspan="1" style="width: 166.8px; display: none;" aria-label="Salary: activate to sort column ascending">Salary</th>
                                                                </tr>
                                                            </thead>


                                                            <tbody>

























































                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
                                                                    <td>Accountant</td>
                                                                    <td style="">Tokyo</td>
                                                                    <td style="">33</td>
                                                                    <td style="">2008/11/28</td>
                                                                    <td style="display: none;">$162,700</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Angelica Ramos</td>
                                                                    <td>Chief Executive Officer (CEO)</td>
                                                                    <td style="">London</td>
                                                                    <td style="">47</td>
                                                                    <td style="">2009/10/09</td>
                                                                    <td style="display: none;">$1,200,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Ashton Cox</td>
                                                                    <td>Junior Technical Author</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">66</td>
                                                                    <td style="">2009/01/12</td>
                                                                    <td style="display: none;">$86,000</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Bradley Greer</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">41</td>
                                                                    <td style="">2012/10/13</td>
                                                                    <td style="display: none;">$132,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Brenden Wagner</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">28</td>
                                                                    <td style="">2011/06/07</td>
                                                                    <td style="display: none;">$206,850</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Brielle Williamson</td>
                                                                    <td>Integration Specialist</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">61</td>
                                                                    <td style="">2012/12/02</td>
                                                                    <td style="display: none;">$372,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Bruno Nash</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">38</td>
                                                                    <td style="">2011/05/03</td>
                                                                    <td style="display: none;">$163,500</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Caesar Vance</td>
                                                                    <td>Pre-Sales Support</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">21</td>
                                                                    <td style="">2011/12/12</td>
                                                                    <td style="display: none;">$106,450</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Cara Stevens</td>
                                                                    <td>Sales Assistant</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">46</td>
                                                                    <td style="">2011/12/06</td>
                                                                    <td style="display: none;">$145,600</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Cedric Kelly</td>
                                                                    <td>Senior Javascript Developer</td>
                                                                    <td style="">Edinburgh</td>
                                                                    <td style="">22</td>
                                                                    <td style="">2012/03/29</td>
                                                                    <td style="display: none;">$433,060</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="alternative-page-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_full_numbers" id="alternative-page-datatable_paginate">
                                                            <ul class="pagination pagination-rounded">
                                                                <li class="paginate_button page-item first disabled" id="alternative-page-datatable_first"><a href="#" aria-controls="alternative-page-datatable" data-dt-idx="0" tabindex="0" class="page-link">First</a></li>
                                                                <li class="paginate_button page-item previous disabled" id="alternative-page-datatable_previous"><a href="#" aria-controls="alternative-page-datatable" data-dt-idx="1" tabindex="0" class="page-link">Previous</a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="alternative-page-datatable" data-dt-idx="2" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="alternative-page-datatable" data-dt-idx="3" tabindex="0" class="page-link">2</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="alternative-page-datatable" data-dt-idx="4" tabindex="0" class="page-link">3</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="alternative-page-datatable" data-dt-idx="5" tabindex="0" class="page-link">4</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="alternative-page-datatable" data-dt-idx="6" tabindex="0" class="page-link">5</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="alternative-page-datatable" data-dt-idx="7" tabindex="0" class="page-link">6</a></li>
                                                                <li class="paginate_button page-item next" id="alternative-page-datatable_next"><a href="#" aria-controls="alternative-page-datatable" data-dt-idx="8" tabindex="0" class="page-link">Next</a></li>
                                                                <li class="paginate_button page-item last" id="alternative-page-datatable_last"><a href="#" aria-controls="alternative-page-datatable" data-dt-idx="9" tabindex="0" class="page-link">Last</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="alt-pagination-code">
                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"alternative-page-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table dt-responsive nowrap w-100"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                        </div> <!-- end preview code-->
                                    </div> <!-- end tab-content-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Scroll - Vertical</h4>
                                    <p class="text-muted font-14">
                                        This example shows the DataTables table body scrolling in the vertical direction. This can generally be seen as an
                                        alternative method to pagination for displaying a large table in a fairly small vertical area, and as such
                                        pagination has been disabled here (note that this is not mandatory, it will work just fine with pagination enabled
                                        as well!).
                                    </p>

                                    <ul class="nav nav-tabs nav-bordered mb-3">
                                        <li class="nav-item">
                                            <a href="#scroll-vertical-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Preview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#scroll-vertical-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Code
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="scroll-vertical-preview">
                                            <div id="scroll-vertical-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6"></div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="scroll-vertical-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="scroll-vertical-datatable"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="dataTables_scroll">
                                                            <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                                                <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 728px; padding-right: 17px;">
                                                                    <table class="table table-striped dt-responsive nowrap w-100 dataTable no-footer" style="margin-left: 0px; width: 728px;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 682.812px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 0px;" aria-label="Position: activate to sort column ascending">Position</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 0px;" aria-label="Office: activate to sort column ascending">Office</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 0px;" aria-label="Age: activate to sort column ascending">Age</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 0px;" aria-label="Start date: activate to sort column ascending">Start date</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Salary: activate to sort column ascending">Salary</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; max-height: 350px; width: 100%;">
                                                                <table id="scroll-vertical-datatable" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" aria-describedby="scroll-vertical-datatable_info" style="width: 100%;">
                                                                    <thead>
                                                                        <tr style="height: 0px;">
                                                                            <th class="sorting sorting_asc" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 682.812px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Name</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 0px; display: none; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Position: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Position</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 0px; display: none; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Office: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Office</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 0px; display: none; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Age: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Age</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 0px; display: none; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Start date: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Start date</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-vertical-datatable" rowspan="1" colspan="1" style="width: 0px; display: none; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Salary: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Salary</div>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>



                                                                    <tbody>

























































                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
                                                                            <td style="">Accountant</td>
                                                                            <td style="">Tokyo</td>
                                                                            <td style="">33</td>
                                                                            <td style="">2008/11/28</td>
                                                                            <td style="display: none;">$162,700</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Angelica Ramos</td>
                                                                            <td style="">Chief Executive Officer (CEO)</td>
                                                                            <td style="">London</td>
                                                                            <td style="">47</td>
                                                                            <td style="">2009/10/09</td>
                                                                            <td style="display: none;">$1,200,000</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Ashton Cox</td>
                                                                            <td style="">Junior Technical Author</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">66</td>
                                                                            <td style="">2009/01/12</td>
                                                                            <td style="display: none;">$86,000</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Bradley Greer</td>
                                                                            <td style="">Software Engineer</td>
                                                                            <td style="">London</td>
                                                                            <td style="">41</td>
                                                                            <td style="">2012/10/13</td>
                                                                            <td style="display: none;">$132,000</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Brenden Wagner</td>
                                                                            <td style="">Software Engineer</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">28</td>
                                                                            <td style="">2011/06/07</td>
                                                                            <td style="display: none;">$206,850</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Brielle Williamson</td>
                                                                            <td style="">Integration Specialist</td>
                                                                            <td style="">New York</td>
                                                                            <td style="">61</td>
                                                                            <td style="">2012/12/02</td>
                                                                            <td style="display: none;">$372,000</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Bruno Nash</td>
                                                                            <td style="">Software Engineer</td>
                                                                            <td style="">London</td>
                                                                            <td style="">38</td>
                                                                            <td style="">2011/05/03</td>
                                                                            <td style="display: none;">$163,500</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Caesar Vance</td>
                                                                            <td style="">Pre-Sales Support</td>
                                                                            <td style="">New York</td>
                                                                            <td style="">21</td>
                                                                            <td style="">2011/12/12</td>
                                                                            <td style="display: none;">$106,450</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Cara Stevens</td>
                                                                            <td style="">Sales Assistant</td>
                                                                            <td style="">New York</td>
                                                                            <td style="">46</td>
                                                                            <td style="">2011/12/06</td>
                                                                            <td style="display: none;">$145,600</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Cedric Kelly</td>
                                                                            <td style="">Senior Javascript Developer</td>
                                                                            <td style="">Edinburgh</td>
                                                                            <td style="">22</td>
                                                                            <td style="">2012/03/29</td>
                                                                            <td style="display: none;">$433,060</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Charde Marshall</td>
                                                                            <td style="">Regional Director</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">36</td>
                                                                            <td style="">2008/10/16</td>
                                                                            <td style="display: none;">$470,600</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Colleen Hurst</td>
                                                                            <td style="">Javascript Developer</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">39</td>
                                                                            <td style="">2009/09/15</td>
                                                                            <td style="display: none;">$205,500</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Dai Rios</td>
                                                                            <td style="">Personnel Lead</td>
                                                                            <td style="">Edinburgh</td>
                                                                            <td style="">35</td>
                                                                            <td style="">2012/09/26</td>
                                                                            <td style="display: none;">$217,500</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Donna Snider</td>
                                                                            <td style="">Customer Support</td>
                                                                            <td style="">New York</td>
                                                                            <td style="">27</td>
                                                                            <td style="">2011/01/25</td>
                                                                            <td style="display: none;">$112,000</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Doris Wilder</td>
                                                                            <td style="">Sales Assistant</td>
                                                                            <td style="">Sidney</td>
                                                                            <td style="">23</td>
                                                                            <td style="">2010/09/20</td>
                                                                            <td style="display: none;">$85,600</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Finn Camacho</td>
                                                                            <td style="">Support Engineer</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">47</td>
                                                                            <td style="">2009/07/07</td>
                                                                            <td style="display: none;">$87,500</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Fiona Green</td>
                                                                            <td style="">Chief Operating Officer (COO)</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">48</td>
                                                                            <td style="">2010/03/11</td>
                                                                            <td style="display: none;">$850,000</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Garrett Winters</td>
                                                                            <td style="">Accountant</td>
                                                                            <td style="">Tokyo</td>
                                                                            <td style="">63</td>
                                                                            <td style="">2011/07/25</td>
                                                                            <td style="display: none;">$170,750</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Gavin Cortez</td>
                                                                            <td style="">Team Leader</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">22</td>
                                                                            <td style="">2008/10/26</td>
                                                                            <td style="display: none;">$235,500</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Gavin Joyce</td>
                                                                            <td style="">Developer</td>
                                                                            <td style="">Edinburgh</td>
                                                                            <td style="">42</td>
                                                                            <td style="">2010/12/22</td>
                                                                            <td style="display: none;">$92,575</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Gloria Little</td>
                                                                            <td style="">Systems Administrator</td>
                                                                            <td style="">New York</td>
                                                                            <td style="">59</td>
                                                                            <td style="">2009/04/10</td>
                                                                            <td style="display: none;">$237,500</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Haley Kennedy</td>
                                                                            <td style="">Senior Marketing Designer</td>
                                                                            <td style="">London</td>
                                                                            <td style="">43</td>
                                                                            <td style="">2012/12/18</td>
                                                                            <td style="display: none;">$313,500</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Hermione Butler</td>
                                                                            <td style="">Regional Director</td>
                                                                            <td style="">London</td>
                                                                            <td style="">47</td>
                                                                            <td style="">2011/03/21</td>
                                                                            <td style="display: none;">$356,250</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Herrod Chandler</td>
                                                                            <td style="">Sales Assistant</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">59</td>
                                                                            <td style="">2012/08/06</td>
                                                                            <td style="display: none;">$137,500</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Hope Fuentes</td>
                                                                            <td style="">Secretary</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">41</td>
                                                                            <td style="">2010/02/12</td>
                                                                            <td style="display: none;">$109,850</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Howard Hatfield</td>
                                                                            <td style="">Office Manager</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">51</td>
                                                                            <td style="">2008/12/16</td>
                                                                            <td style="display: none;">$164,500</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Jackson Bradshaw</td>
                                                                            <td style="">Director</td>
                                                                            <td style="">New York</td>
                                                                            <td style="">65</td>
                                                                            <td style="">2008/09/26</td>
                                                                            <td style="display: none;">$645,750</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Jena Gaines</td>
                                                                            <td style="">Office Manager</td>
                                                                            <td style="">London</td>
                                                                            <td style="">30</td>
                                                                            <td style="">2008/12/19</td>
                                                                            <td style="display: none;">$90,560</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Jenette Caldwell</td>
                                                                            <td style="">Development Lead</td>
                                                                            <td style="">New York</td>
                                                                            <td style="">30</td>
                                                                            <td style="">2011/09/03</td>
                                                                            <td style="display: none;">$345,000</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Jennifer Acosta</td>
                                                                            <td style="">Junior Javascript Developer</td>
                                                                            <td style="">Edinburgh</td>
                                                                            <td style="">43</td>
                                                                            <td style="">2013/02/01</td>
                                                                            <td style="display: none;">$75,650</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Jennifer Chang</td>
                                                                            <td style="">Regional Director</td>
                                                                            <td style="">Singapore</td>
                                                                            <td style="">28</td>
                                                                            <td style="">2010/11/14</td>
                                                                            <td style="display: none;">$357,650</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Jonas Alexander</td>
                                                                            <td style="">Developer</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">30</td>
                                                                            <td style="">2010/07/14</td>
                                                                            <td style="display: none;">$86,500</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Lael Greer</td>
                                                                            <td style="">Systems Administrator</td>
                                                                            <td style="">London</td>
                                                                            <td style="">21</td>
                                                                            <td style="">2009/02/27</td>
                                                                            <td style="display: none;">$103,500</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Martena Mccray</td>
                                                                            <td style="">Post-Sales support</td>
                                                                            <td style="">Edinburgh</td>
                                                                            <td style="">46</td>
                                                                            <td style="">2011/03/09</td>
                                                                            <td style="display: none;">$324,050</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Michael Bruce</td>
                                                                            <td style="">Javascript Developer</td>
                                                                            <td style="">Singapore</td>
                                                                            <td style="">29</td>
                                                                            <td style="">2011/06/27</td>
                                                                            <td style="display: none;">$183,000</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Michael Silva</td>
                                                                            <td style="">Marketing Designer</td>
                                                                            <td style="">London</td>
                                                                            <td style="">66</td>
                                                                            <td style="">2012/11/27</td>
                                                                            <td style="display: none;">$198,500</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Michelle House</td>
                                                                            <td style="">Integration Specialist</td>
                                                                            <td style="">Sidney</td>
                                                                            <td style="">37</td>
                                                                            <td style="">2011/06/02</td>
                                                                            <td style="display: none;">$95,400</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Olivia Liang</td>
                                                                            <td style="">Support Engineer</td>
                                                                            <td style="">Singapore</td>
                                                                            <td style="">64</td>
                                                                            <td style="">2011/02/03</td>
                                                                            <td style="display: none;">$234,500</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Paul Byrd</td>
                                                                            <td style="">Chief Financial Officer (CFO)</td>
                                                                            <td style="">New York</td>
                                                                            <td style="">64</td>
                                                                            <td style="">2010/06/09</td>
                                                                            <td style="display: none;">$725,000</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Prescott Bartlett</td>
                                                                            <td style="">Technical Author</td>
                                                                            <td style="">London</td>
                                                                            <td style="">27</td>
                                                                            <td style="">2011/05/07</td>
                                                                            <td style="display: none;">$145,000</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Quinn Flynn</td>
                                                                            <td style="">Support Lead</td>
                                                                            <td style="">Edinburgh</td>
                                                                            <td style="">22</td>
                                                                            <td style="">2013/03/03</td>
                                                                            <td style="display: none;">$342,000</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Rhona Davidson</td>
                                                                            <td style="">Integration Specialist</td>
                                                                            <td style="">Tokyo</td>
                                                                            <td style="">55</td>
                                                                            <td style="">2010/10/14</td>
                                                                            <td style="display: none;">$327,900</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Sakura Yamamoto</td>
                                                                            <td style="">Support Engineer</td>
                                                                            <td style="">Tokyo</td>
                                                                            <td style="">37</td>
                                                                            <td style="">2009/08/19</td>
                                                                            <td style="display: none;">$139,575</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Serge Baldwin</td>
                                                                            <td style="">Data Coordinator</td>
                                                                            <td style="">Singapore</td>
                                                                            <td style="">64</td>
                                                                            <td style="">2012/04/09</td>
                                                                            <td style="display: none;">$138,575</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Shad Decker</td>
                                                                            <td style="">Regional Director</td>
                                                                            <td style="">Edinburgh</td>
                                                                            <td style="">51</td>
                                                                            <td style="">2008/11/13</td>
                                                                            <td style="display: none;">$183,000</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Shou Itou</td>
                                                                            <td style="">Regional Marketing</td>
                                                                            <td style="">Tokyo</td>
                                                                            <td style="">20</td>
                                                                            <td style="">2011/08/14</td>
                                                                            <td style="display: none;">$163,000</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Sonya Frost</td>
                                                                            <td style="">Software Engineer</td>
                                                                            <td style="">Edinburgh</td>
                                                                            <td style="">23</td>
                                                                            <td style="">2008/12/13</td>
                                                                            <td style="display: none;">$103,600</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Suki Burks</td>
                                                                            <td style="">Developer</td>
                                                                            <td style="">London</td>
                                                                            <td style="">53</td>
                                                                            <td style="">2009/10/22</td>
                                                                            <td style="display: none;">$114,500</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Tatyana Fitzpatrick</td>
                                                                            <td style="">Regional Director</td>
                                                                            <td style="">London</td>
                                                                            <td style="">19</td>
                                                                            <td style="">2010/03/17</td>
                                                                            <td style="display: none;">$385,750</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Thor Walton</td>
                                                                            <td style="">Developer</td>
                                                                            <td style="">New York</td>
                                                                            <td style="">61</td>
                                                                            <td style="">2013/08/11</td>
                                                                            <td style="display: none;">$98,540</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Tiger Nixon</td>
                                                                            <td style="">System Architect</td>
                                                                            <td style="">Edinburgh</td>
                                                                            <td style="">61</td>
                                                                            <td style="">2011/04/25</td>
                                                                            <td style="display: none;">$320,800</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Timothy Mooney</td>
                                                                            <td style="">Office Manager</td>
                                                                            <td style="">London</td>
                                                                            <td style="">37</td>
                                                                            <td style="">2008/12/11</td>
                                                                            <td style="display: none;">$136,200</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Unity Butler</td>
                                                                            <td style="">Marketing Designer</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">47</td>
                                                                            <td style="">2009/12/09</td>
                                                                            <td style="display: none;">$85,675</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Vivian Harrell</td>
                                                                            <td style="">Financial Controller</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">62</td>
                                                                            <td style="">2009/02/14</td>
                                                                            <td style="display: none;">$452,500</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Yuri Berry</td>
                                                                            <td style="">Chief Marketing Officer (CMO)</td>
                                                                            <td style="">New York</td>
                                                                            <td style="">40</td>
                                                                            <td style="">2009/06/25</td>
                                                                            <td style="display: none;">$675,000</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Zenaida Frank</td>
                                                                            <td style="">Software Engineer</td>
                                                                            <td style="">New York</td>
                                                                            <td style="">63</td>
                                                                            <td style="">2010/01/04</td>
                                                                            <td style="display: none;">$125,250</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="dtr-control sorting_1" tabindex="0">Zorita Serrano</td>
                                                                            <td style="">Software Engineer</td>
                                                                            <td style="">San Francisco</td>
                                                                            <td style="">56</td>
                                                                            <td style="">2012/06/01</td>
                                                                            <td style="display: none;">$115,000</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="scroll-vertical-datatable_info" role="status" aria-live="polite">Showing 1 to 57 of 57 entries</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7"></div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="scroll-vertical-code">
                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"scroll-vertical-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table dt-responsive nowrap w-100"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br><br><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                        </div> <!-- end preview code-->
                                    </div> <!-- end tab-content-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div><!-- end row-->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Scroll - Horizontal</h4>
                                    <p class="text-muted font-14">
                                        DataTables has the ability to show tables with horizontal scrolling, which is very useful for when you have a wide
                                        table, but want to constrain it to a limited horizontal display area.
                                    </p>

                                    <ul class="nav nav-tabs nav-bordered mb-3">
                                        <li class="nav-item">
                                            <a href="#scroll-horizontal-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Preview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#scroll-horizontal-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Code
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="scroll-horizontal-preview">
                                            <div id="scroll-horizontal-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="scroll-horizontal-datatable_length"><label class="form-label">Show <select name="scroll-horizontal-datatable_length" aria-controls="scroll-horizontal-datatable" class="form-select form-select-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> entries</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="scroll-horizontal-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="scroll-horizontal-datatable"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="dataTables_scroll">
                                                            <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                                                <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1155.33px; padding-right: 0px;">
                                                                    <table class="table table-striped w-100 nowrap dataTable no-footer" style="margin-left: 0px; width: 1155.33px;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 71.0469px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">First name</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 69.0938px;" aria-label="Last name: activate to sort column ascending">Last name</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 172.609px;" aria-label="Position: activate to sort column ascending">Position</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 73.6875px;" aria-label="Office: activate to sort column ascending">Office</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 27.1562px;" aria-label="Age: activate to sort column ascending">Age</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 67.6875px;" aria-label="Start date: activate to sort column ascending">Start date</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 60.875px;" aria-label="Salary: activate to sort column ascending">Salary</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 33.9844px;" aria-label="Extn.: activate to sort column ascending">Extn.</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 172.5px;" aria-label="E-mail: activate to sort column ascending">E-mail</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%;">
                                                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap dataTable no-footer" aria-describedby="scroll-horizontal-datatable_info" style="width: 1146px;">
                                                                    <thead>
                                                                        <tr style="height: 0px;">
                                                                            <th class="sorting sorting_asc" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 71.0469px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">First name</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 69.0938px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Last name: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Last name</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 172.609px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Position: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Position</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 73.6875px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Office: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Office</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 27.1562px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Age: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Age</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 67.6875px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Start date: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Start date</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 60.875px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Salary: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Salary</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 33.9844px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Extn.: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Extn.</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="scroll-horizontal-datatable" rowspan="1" colspan="1" style="width: 172.5px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="E-mail: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">E-mail</div>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>

























































                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Airi</td>
                                                                            <td>Satou</td>
                                                                            <td>Accountant</td>
                                                                            <td>Tokyo</td>
                                                                            <td>33</td>
                                                                            <td>2008/11/28</td>
                                                                            <td>$162,700</td>
                                                                            <td>5407</td>
                                                                            <td>a.satou@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Angelica</td>
                                                                            <td>Ramos</td>
                                                                            <td>Chief Executive Officer (CEO)</td>
                                                                            <td>London</td>
                                                                            <td>47</td>
                                                                            <td>2009/10/09</td>
                                                                            <td>$1,200,000</td>
                                                                            <td>5797</td>
                                                                            <td>a.ramos@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Ashton</td>
                                                                            <td>Cox</td>
                                                                            <td>Junior Technical Author</td>
                                                                            <td>San Francisco</td>
                                                                            <td>66</td>
                                                                            <td>2009/01/12</td>
                                                                            <td>$86,000</td>
                                                                            <td>1562</td>
                                                                            <td>a.cox@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Bradley</td>
                                                                            <td>Greer</td>
                                                                            <td>Software Engineer</td>
                                                                            <td>London</td>
                                                                            <td>41</td>
                                                                            <td>2012/10/13</td>
                                                                            <td>$132,000</td>
                                                                            <td>2558</td>
                                                                            <td>b.greer@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Brenden</td>
                                                                            <td>Wagner</td>
                                                                            <td>Software Engineer</td>
                                                                            <td>San Francisco</td>
                                                                            <td>28</td>
                                                                            <td>2011/06/07</td>
                                                                            <td>$206,850</td>
                                                                            <td>1314</td>
                                                                            <td>b.wagner@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Brielle</td>
                                                                            <td>Williamson</td>
                                                                            <td>Integration Specialist</td>
                                                                            <td>New York</td>
                                                                            <td>61</td>
                                                                            <td>2012/12/02</td>
                                                                            <td>$372,000</td>
                                                                            <td>4804</td>
                                                                            <td>b.williamson@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Bruno</td>
                                                                            <td>Nash</td>
                                                                            <td>Software Engineer</td>
                                                                            <td>London</td>
                                                                            <td>38</td>
                                                                            <td>2011/05/03</td>
                                                                            <td>$163,500</td>
                                                                            <td>6222</td>
                                                                            <td>b.nash@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Caesar</td>
                                                                            <td>Vance</td>
                                                                            <td>Pre-Sales Support</td>
                                                                            <td>New York</td>
                                                                            <td>21</td>
                                                                            <td>2011/12/12</td>
                                                                            <td>$106,450</td>
                                                                            <td>8330</td>
                                                                            <td>c.vance@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Cara</td>
                                                                            <td>Stevens</td>
                                                                            <td>Sales Assistant</td>
                                                                            <td>New York</td>
                                                                            <td>46</td>
                                                                            <td>2011/12/06</td>
                                                                            <td>$145,600</td>
                                                                            <td>3990</td>
                                                                            <td>c.stevens@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Cedric</td>
                                                                            <td>Kelly</td>
                                                                            <td>Senior Javascript Developer</td>
                                                                            <td>Edinburgh</td>
                                                                            <td>22</td>
                                                                            <td>2012/03/29</td>
                                                                            <td>$433,060</td>
                                                                            <td>6224</td>
                                                                            <td>c.kelly@datatables.net</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="scroll-horizontal-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="scroll-horizontal-datatable_paginate">
                                                            <ul class="pagination pagination-rounded">
                                                                <li class="paginate_button page-item previous disabled" id="scroll-horizontal-datatable_previous"><a href="#" aria-controls="scroll-horizontal-datatable" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="scroll-horizontal-datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="scroll-horizontal-datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="scroll-horizontal-datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="scroll-horizontal-datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="scroll-horizontal-datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="scroll-horizontal-datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                                <li class="paginate_button page-item next" id="scroll-horizontal-datatable_next"><a href="#" aria-controls="scroll-horizontal-datatable" data-dt-idx="7" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="scroll-horizontal-code">
                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"scroll-horizontal-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table w-100 nowrap"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>First name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Last name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Extn.<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>E-mail<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>5421<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>t.nixon@datatables.net<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>8422<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>g.winters@datatables.net<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                        </div> <!-- end preview code-->
                                    </div> <!-- end tab-content-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Complex headers with column visibility</h4>
                                    <p class="text-muted font-14">
                                        Complex headers (using <code>colspan</code> / <code>rowspan</code>) can be used to group columns of similar information in DataTables, creating a very powerful visual effect.
                                    </p>

                                    <ul class="nav nav-tabs nav-bordered mb-3">
                                        <li class="nav-item">
                                            <a href="#complex-headers-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Preview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#complex-headers-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Code
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="complex-headers-preview">
                                            <div id="complex-header-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="complex-header-datatable_length"><label class="form-label">Show <select name="complex-header-datatable_length" aria-controls="complex-header-datatable" class="form-select form-select-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> entries</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="complex-header-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="complex-header-datatable"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="complex-header-datatable" class="table table-striped dt-responsive nowrap w-100 dataTable dtr-inline" aria-describedby="complex-header-datatable_info" style="width: 1550px;">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th rowspan="2" class="align-middle sorting sorting_asc" tabindex="0" aria-controls="complex-header-datatable" colspan="1" style="width: 306.8px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                                    <th colspan="2" rowspan="1">HR Information</th>
                                                                    <th colspan="2" rowspan="1">Contact</th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="sorting" tabindex="0" aria-controls="complex-header-datatable" rowspan="1" colspan="1" style="width: 447.8px;" aria-label="Position: activate to sort column ascending">Position</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="complex-header-datatable" rowspan="1" colspan="1" style="width: 200.8px;" aria-label="Salary: activate to sort column ascending">Salary</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="complex-header-datatable" rowspan="1" colspan="1" style="width: 229.8px;" aria-label="Office: activate to sort column ascending">Office</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="complex-header-datatable" rowspan="1" colspan="1" style="width: 138.8px;" aria-label="Extn.: activate to sort column ascending">Extn.</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

























































                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
                                                                    <td>Accountant</td>
                                                                    <td style="">$162,700</td>
                                                                    <td style="">Tokyo</td>
                                                                    <td style="">5407</td>

                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Angelica Ramos</td>
                                                                    <td>Chief Executive Officer (CEO)</td>
                                                                    <td style="">$1,200,000</td>
                                                                    <td style="">London</td>
                                                                    <td style="">5797</td>

                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Ashton Cox</td>
                                                                    <td>Junior Technical Author</td>
                                                                    <td style="">$86,000</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">1562</td>

                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Bradley Greer</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">$132,000</td>
                                                                    <td style="">London</td>
                                                                    <td style="">2558</td>

                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Brenden Wagner</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">$206,850</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">1314</td>

                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Brielle Williamson</td>
                                                                    <td>Integration Specialist</td>
                                                                    <td style="">$372,000</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">4804</td>

                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Bruno Nash</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">$163,500</td>
                                                                    <td style="">London</td>
                                                                    <td style="">6222</td>

                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Caesar Vance</td>
                                                                    <td>Pre-Sales Support</td>
                                                                    <td style="">$106,450</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">8330</td>

                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Cara Stevens</td>
                                                                    <td>Sales Assistant</td>
                                                                    <td style="">$145,600</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">3990</td>

                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Cedric Kelly</td>
                                                                    <td>Senior Javascript Developer</td>
                                                                    <td style="">$433,060</td>
                                                                    <td style="">Edinburgh</td>
                                                                    <td style="">6224</td>

                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th rowspan="1" colspan="1">Name</th>
                                                                    <th rowspan="1" colspan="1">Position</th>
                                                                    <th rowspan="1" colspan="1" style="">Salary</th>
                                                                    <th rowspan="1" colspan="1" style="">Office</th>
                                                                    <th rowspan="1" colspan="1" style="">Extn.</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="complex-header-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="complex-header-datatable_paginate">
                                                            <ul class="pagination pagination-rounded">
                                                                <li class="paginate_button page-item previous disabled" id="complex-header-datatable_previous"><a href="#" aria-controls="complex-header-datatable" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="complex-header-datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="complex-header-datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="complex-header-datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="complex-header-datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="complex-header-datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="complex-header-datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                                <li class="paginate_button page-item next" id="complex-header-datatable_next"><a href="#" aria-controls="complex-header-datatable" data-dt-idx="7" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="complex-headers-code">
                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"complex-header-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table dt-responsive nowrap w-100"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table-light"</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">rowspan</span>=<span class="hljs-string">"2"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"align-middle"</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">colspan</span>=<span class="hljs-string">"2"</span>&gt;</span>HR Information<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span> <span class="hljs-attr">colspan</span>=<span class="hljs-string">"3"</span>&gt;</span>Contact<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Extn.<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>E-mail<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>5421<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>t.nixon@datatables.net<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>8422<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>g.winters@datatables.net<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tfoot</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Extn.<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>E-mail<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tfoot</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                        </div> <!-- end preview code-->
                                    </div> <!-- end tab-content-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Row Created Callback</h4>
                                    <p class="text-muted font-14">
                                        The following example shows how a callback function can be used to format a particular row at draw time. For each
                                        row that is generated for display, the createdRow function is called once and once only. It is passed the create row
                                        node which can then be modified.
                                    </p>

                                    <ul class="nav nav-tabs nav-bordered mb-3">
                                        <li class="nav-item">
                                            <a href="#row-callback-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Preview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#row-callback-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Code
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="row-callback-preview">
                                            <div id="row-callback-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="row-callback-datatable_length"><label class="form-label">Show <select name="row-callback-datatable_length" aria-controls="row-callback-datatable" class="form-select form-select-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> entries</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="row-callback-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="row-callback-datatable"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="row-callback-datatable" class="table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" aria-describedby="row-callback-datatable_info" style="width: 1550px;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 258.8px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 379.8px;" aria-label="Position: activate to sort column ascending">Position</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 192.8px;" aria-label="Office: activate to sort column ascending">Office</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 99.8px;" aria-label="Age: activate to sort column ascending">Age</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 180.8px;" aria-label="Start date: activate to sort column ascending">Start date</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="row-callback-datatable" rowspan="1" colspan="1" style="width: 166.8px; display: none;" aria-label="Salary: activate to sort column ascending">Salary</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

























































                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
                                                                    <td>Accountant</td>
                                                                    <td style="">Tokyo</td>
                                                                    <td style="">33</td>
                                                                    <td style="">2008/11/28</td>
                                                                    <td class="text-danger" style="display: none;">$162,700</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Angelica Ramos</td>
                                                                    <td>Chief Executive Officer (CEO)</td>
                                                                    <td style="">London</td>
                                                                    <td style="">47</td>
                                                                    <td style="">2009/10/09</td>
                                                                    <td class="text-danger" style="display: none;">$1,200,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Ashton Cox</td>
                                                                    <td>Junior Technical Author</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">66</td>
                                                                    <td style="">2009/01/12</td>
                                                                    <td style="display: none;">$86,000</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Bradley Greer</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">41</td>
                                                                    <td style="">2012/10/13</td>
                                                                    <td style="display: none;">$132,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Brenden Wagner</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">28</td>
                                                                    <td style="">2011/06/07</td>
                                                                    <td class="text-danger" style="display: none;">$206,850</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Brielle Williamson</td>
                                                                    <td>Integration Specialist</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">61</td>
                                                                    <td style="">2012/12/02</td>
                                                                    <td class="text-danger" style="display: none;">$372,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Bruno Nash</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">38</td>
                                                                    <td style="">2011/05/03</td>
                                                                    <td class="text-danger" style="display: none;">$163,500</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Caesar Vance</td>
                                                                    <td>Pre-Sales Support</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">21</td>
                                                                    <td style="">2011/12/12</td>
                                                                    <td style="display: none;">$106,450</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Cara Stevens</td>
                                                                    <td>Sales Assistant</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">46</td>
                                                                    <td style="">2011/12/06</td>
                                                                    <td style="display: none;">$145,600</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Cedric Kelly</td>
                                                                    <td>Senior Javascript Developer</td>
                                                                    <td style="">Edinburgh</td>
                                                                    <td style="">22</td>
                                                                    <td style="">2012/03/29</td>
                                                                    <td class="text-danger" style="display: none;">$433,060</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="row-callback-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="row-callback-datatable_paginate">
                                                            <ul class="pagination pagination-rounded">
                                                                <li class="paginate_button page-item previous disabled" id="row-callback-datatable_previous"><a href="#" aria-controls="row-callback-datatable" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="row-callback-datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="row-callback-datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="row-callback-datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="row-callback-datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="row-callback-datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="row-callback-datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                                <li class="paginate_button page-item next" id="row-callback-datatable_next"><a href="#" aria-controls="row-callback-datatable" data-dt-idx="7" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="row-callback-code">
                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"row-callback-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table dt-responsive nowrap w-100"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                        </div> <!-- end preview code-->
                                    </div> <!-- end tab-content-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">State Saving</h4>
                                    <p class="text-muted font-14">
                                        DataTables has the option of being able to save the state of a table (its paging position, ordering state etc) so
                                        that is can be restored when the user reloads a page, or comes back to the page after visiting a sub-page. This
                                        state saving ability is enabled by the stateSave option.
                                    </p>

                                    <ul class="nav nav-tabs nav-bordered mb-3">
                                        <li class="nav-item">
                                            <a href="#state-saving-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Preview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#state-saving-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Code
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="state-saving-preview">
                                            <div id="state-saving-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="state-saving-datatable_length"><label class="form-label">Show <select name="state-saving-datatable_length" aria-controls="state-saving-datatable" class="form-select form-select-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> entries</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="state-saving-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="state-saving-datatable"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="state-saving-datatable" class="table table-striped activate-select dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" aria-describedby="state-saving-datatable_info" style="width: 1550px;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="state-saving-datatable" rowspan="1" colspan="1" style="width: 258.8px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="state-saving-datatable" rowspan="1" colspan="1" style="width: 379.8px;" aria-label="Position: activate to sort column ascending">Position</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="state-saving-datatable" rowspan="1" colspan="1" style="width: 192.8px;" aria-label="Office: activate to sort column ascending">Office</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="state-saving-datatable" rowspan="1" colspan="1" style="width: 99.8px;" aria-label="Age: activate to sort column ascending">Age</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="state-saving-datatable" rowspan="1" colspan="1" style="width: 180.8px;" aria-label="Start date: activate to sort column ascending">Start date</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="state-saving-datatable" rowspan="1" colspan="1" style="width: 166.8px; display: none;" aria-label="Salary: activate to sort column ascending">Salary</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>

























































                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Jennifer Chang</td>
                                                                    <td>Regional Director</td>
                                                                    <td style="">Singapore</td>
                                                                    <td style="">28</td>
                                                                    <td style="">2010/11/14</td>
                                                                    <td style="display: none;">$357,650</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Jonas Alexander</td>
                                                                    <td>Developer</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">30</td>
                                                                    <td style="">2010/07/14</td>
                                                                    <td style="display: none;">$86,500</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Lael Greer</td>
                                                                    <td>Systems Administrator</td>
                                                                    <td style="">London</td>
                                                                    <td style="">21</td>
                                                                    <td style="">2009/02/27</td>
                                                                    <td style="display: none;">$103,500</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Martena Mccray</td>
                                                                    <td>Post-Sales support</td>
                                                                    <td style="">Edinburgh</td>
                                                                    <td style="">46</td>
                                                                    <td style="">2011/03/09</td>
                                                                    <td style="display: none;">$324,050</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Michael Bruce</td>
                                                                    <td>Javascript Developer</td>
                                                                    <td style="">Singapore</td>
                                                                    <td style="">29</td>
                                                                    <td style="">2011/06/27</td>
                                                                    <td style="display: none;">$183,000</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Michael Silva</td>
                                                                    <td>Marketing Designer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">66</td>
                                                                    <td style="">2012/11/27</td>
                                                                    <td style="display: none;">$198,500</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Michelle House</td>
                                                                    <td>Integration Specialist</td>
                                                                    <td style="">Sidney</td>
                                                                    <td style="">37</td>
                                                                    <td style="">2011/06/02</td>
                                                                    <td style="display: none;">$95,400</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Olivia Liang</td>
                                                                    <td>Support Engineer</td>
                                                                    <td style="">Singapore</td>
                                                                    <td style="">64</td>
                                                                    <td style="">2011/02/03</td>
                                                                    <td style="display: none;">$234,500</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Paul Byrd</td>
                                                                    <td>Chief Financial Officer (CFO)</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">64</td>
                                                                    <td style="">2010/06/09</td>
                                                                    <td style="display: none;">$725,000</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Prescott Bartlett</td>
                                                                    <td>Technical Author</td>
                                                                    <td style="">London</td>
                                                                    <td style="">27</td>
                                                                    <td style="">2011/05/07</td>
                                                                    <td style="display: none;">$145,000</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="state-saving-datatable_info" role="status" aria-live="polite">Showing 31 to 40 of 57 entries</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="state-saving-datatable_paginate">
                                                            <ul class="pagination pagination-rounded">
                                                                <li class="paginate_button page-item previous" id="state-saving-datatable_previous"><a href="#" aria-controls="state-saving-datatable" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="state-saving-datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="state-saving-datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="state-saving-datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="state-saving-datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="state-saving-datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="state-saving-datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                                <li class="paginate_button page-item next" id="state-saving-datatable_next"><a href="#" aria-controls="state-saving-datatable" data-dt-idx="7" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="state-saving-code">
                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"state-saving-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table activate-select dt-responsive nowrap w-100"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                        </div> <!-- end preview code-->
                                    </div> <!-- end tab-content-->

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Fixed Header</h4>
                                    <p class="text-muted font-14">
                                        The FixedHeader will freeze in place the header and/or footer in a DataTable, ensuring that title information will remain always visible.
                                    </p>

                                    <ul class="nav nav-tabs nav-bordered mb-3">
                                        <li class="nav-item">
                                            <a href="#fixed-header-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Preview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#fixed-header-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Code
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="fixed-header-preview">
                                            <div id="fixed-header-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="fixed-header-datatable_length"><label class="form-label">Show <select name="fixed-header-datatable_length" aria-controls="fixed-header-datatable" class="form-select form-select-sm">
                                                                    <option value="10">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select> entries</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="fixed-header-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="fixed-header-datatable"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="fixed-header-datatable" class="table table-striped dt-responsive nowrap table-striped w-100 dataTable dtr-inline collapsed" aria-describedby="fixed-header-datatable_info" style="width: 1550px;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="fixed-header-datatable" rowspan="1" colspan="1" style="width: 258.8px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="fixed-header-datatable" rowspan="1" colspan="1" style="width: 379.8px;" aria-label="Position: activate to sort column ascending">Position</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="fixed-header-datatable" rowspan="1" colspan="1" style="width: 192.8px;" aria-label="Office: activate to sort column ascending">Office</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="fixed-header-datatable" rowspan="1" colspan="1" style="width: 99.8px;" aria-label="Age: activate to sort column ascending">Age</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="fixed-header-datatable" rowspan="1" colspan="1" style="width: 180.8px;" aria-label="Start date: activate to sort column ascending">Start date</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="fixed-header-datatable" rowspan="1" colspan="1" style="width: 166.8px; display: none;" aria-label="Salary: activate to sort column ascending">Salary</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>

























































                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Airi Satou</td>
                                                                    <td>Accountant</td>
                                                                    <td style="">Tokyo</td>
                                                                    <td style="">33</td>
                                                                    <td style="">2008/11/28</td>
                                                                    <td style="display: none;">$162,700</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Angelica Ramos</td>
                                                                    <td>Chief Executive Officer (CEO)</td>
                                                                    <td style="">London</td>
                                                                    <td style="">47</td>
                                                                    <td style="">2009/10/09</td>
                                                                    <td style="display: none;">$1,200,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Ashton Cox</td>
                                                                    <td>Junior Technical Author</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">66</td>
                                                                    <td style="">2009/01/12</td>
                                                                    <td style="display: none;">$86,000</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Bradley Greer</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">41</td>
                                                                    <td style="">2012/10/13</td>
                                                                    <td style="display: none;">$132,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Brenden Wagner</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">San Francisco</td>
                                                                    <td style="">28</td>
                                                                    <td style="">2011/06/07</td>
                                                                    <td style="display: none;">$206,850</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Brielle Williamson</td>
                                                                    <td>Integration Specialist</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">61</td>
                                                                    <td style="">2012/12/02</td>
                                                                    <td style="display: none;">$372,000</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Bruno Nash</td>
                                                                    <td>Software Engineer</td>
                                                                    <td style="">London</td>
                                                                    <td style="">38</td>
                                                                    <td style="">2011/05/03</td>
                                                                    <td style="display: none;">$163,500</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="sorting_1 dtr-control">Caesar Vance</td>
                                                                    <td>Pre-Sales Support</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">21</td>
                                                                    <td style="">2011/12/12</td>
                                                                    <td style="display: none;">$106,450</td>
                                                                </tr>
                                                                <tr class="odd">
                                                                    <td class="sorting_1 dtr-control">Cara Stevens</td>
                                                                    <td>Sales Assistant</td>
                                                                    <td style="">New York</td>
                                                                    <td style="">46</td>
                                                                    <td style="">2011/12/06</td>
                                                                    <td style="display: none;">$145,600</td>
                                                                </tr>
                                                                <tr class="even">
                                                                    <td class="dtr-control sorting_1" tabindex="0">Cedric Kelly</td>
                                                                    <td>Senior Javascript Developer</td>
                                                                    <td style="">Edinburgh</td>
                                                                    <td style="">22</td>
                                                                    <td style="">2012/03/29</td>
                                                                    <td style="display: none;">$433,060</td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th rowspan="1" colspan="1">Name</th>
                                                                    <th rowspan="1" colspan="1">Position</th>
                                                                    <th rowspan="1" colspan="1" style="">Office</th>
                                                                    <th rowspan="1" colspan="1" style="">Age</th>
                                                                    <th rowspan="1" colspan="1" style="">Start date</th>
                                                                    <th rowspan="1" colspan="1" style="display: none;">Salary</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="fixed-header-datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7">
                                                        <div class="dataTables_paginate paging_simple_numbers" id="fixed-header-datatable_paginate">
                                                            <ul class="pagination pagination-rounded">
                                                                <li class="paginate_button page-item previous disabled" id="fixed-header-datatable_previous"><a href="#" aria-controls="fixed-header-datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                                <li class="paginate_button page-item active"><a href="#" aria-controls="fixed-header-datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="fixed-header-datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="fixed-header-datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="fixed-header-datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="fixed-header-datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                                                <li class="paginate_button page-item "><a href="#" aria-controls="fixed-header-datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                                                <li class="paginate_button page-item next" id="fixed-header-datatable_next"><a href="#" aria-controls="fixed-header-datatable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="fixed-header-code">
                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"fixed-header-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table dt-responsive nowrap table-striped w-100"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                        </div> <!-- end preview code-->
                                    </div> <!-- end tab-content-->
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Fixed Columns</h4>
                                    <p class="text-muted font-14">
                                        When making use of DataTables' x-axis scrolling feature you may wish to fix the left or right most columns in place
                                    </p>

                                    <ul class="nav nav-tabs nav-bordered mb-3">
                                        <li class="nav-item">
                                            <a href="#fixed-columns-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                                Preview
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#fixed-columns-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                                Code
                                            </a>
                                        </li>
                                    </ul> <!-- end nav-->

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="fixed-columns-preview">
                                            <div id="fixed-columns-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6"></div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="fixed-columns-datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="fixed-columns-datatable"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="dataTables_scroll">
                                                            <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                                                <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1162.5px; padding-right: 17px;">
                                                                    <table class="table table-striped nowrap row-border order-column w-100 dataTable no-footer" style="margin-left: 0px; width: 1162.5px;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 71.0469px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">First name</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 69.0938px;" aria-label="Last name: activate to sort column ascending">Last name</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 179.781px;" aria-label="Position: activate to sort column ascending">Position</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 73.6875px;" aria-label="Office: activate to sort column ascending">Office</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 27.1562px;" aria-label="Age: activate to sort column ascending">Age</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 67.6875px;" aria-label="Start date: activate to sort column ascending">Start date</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 60.875px;" aria-label="Salary: activate to sort column ascending">Salary</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 33.9844px;" aria-label="Extn.: activate to sort column ascending">Extn.</th>
                                                                                <th class="sorting" tabindex="0" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 172.5px;" aria-label="E-mail: activate to sort column ascending">E-mail</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 300px;">
                                                                <table id="fixed-columns-datatable" class="table table-striped nowrap row-border order-column w-100 dataTable no-footer" aria-describedby="fixed-columns-datatable_info" style="width: 1146px;">
                                                                    <thead>
                                                                        <tr style="height: 0px;">
                                                                            <th class="sorting sorting_asc" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 71.0469px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-sort="ascending" aria-label="First name: activate to sort column descending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">First name</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 69.0938px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Last name: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Last name</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 179.781px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Position: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Position</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 73.6875px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Office: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Office</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 27.1562px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Age: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Age</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 67.6875px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Start date: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Start date</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 60.875px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Salary: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Salary</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 33.9844px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Extn.: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Extn.</div>
                                                                            </th>
                                                                            <th class="sorting" aria-controls="fixed-columns-datatable" rowspan="1" colspan="1" style="width: 172.5px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="E-mail: activate to sort column ascending">
                                                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">E-mail</div>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>

























































                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Airi</td>
                                                                            <td>Satou</td>
                                                                            <td>Accountant</td>
                                                                            <td>Tokyo</td>
                                                                            <td>33</td>
                                                                            <td>2008/11/28</td>
                                                                            <td>$162,700</td>
                                                                            <td>5407</td>
                                                                            <td>a.satou@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Angelica</td>
                                                                            <td>Ramos</td>
                                                                            <td>Chief Executive Officer (CEO)</td>
                                                                            <td>London</td>
                                                                            <td>47</td>
                                                                            <td>2009/10/09</td>
                                                                            <td>$1,200,000</td>
                                                                            <td>5797</td>
                                                                            <td>a.ramos@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Ashton</td>
                                                                            <td>Cox</td>
                                                                            <td>Junior Technical Author</td>
                                                                            <td>San Francisco</td>
                                                                            <td>66</td>
                                                                            <td>2009/01/12</td>
                                                                            <td>$86,000</td>
                                                                            <td>1562</td>
                                                                            <td>a.cox@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Bradley</td>
                                                                            <td>Greer</td>
                                                                            <td>Software Engineer</td>
                                                                            <td>London</td>
                                                                            <td>41</td>
                                                                            <td>2012/10/13</td>
                                                                            <td>$132,000</td>
                                                                            <td>2558</td>
                                                                            <td>b.greer@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Brenden</td>
                                                                            <td>Wagner</td>
                                                                            <td>Software Engineer</td>
                                                                            <td>San Francisco</td>
                                                                            <td>28</td>
                                                                            <td>2011/06/07</td>
                                                                            <td>$206,850</td>
                                                                            <td>1314</td>
                                                                            <td>b.wagner@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Brielle</td>
                                                                            <td>Williamson</td>
                                                                            <td>Integration Specialist</td>
                                                                            <td>New York</td>
                                                                            <td>61</td>
                                                                            <td>2012/12/02</td>
                                                                            <td>$372,000</td>
                                                                            <td>4804</td>
                                                                            <td>b.williamson@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Bruno</td>
                                                                            <td>Nash</td>
                                                                            <td>Software Engineer</td>
                                                                            <td>London</td>
                                                                            <td>38</td>
                                                                            <td>2011/05/03</td>
                                                                            <td>$163,500</td>
                                                                            <td>6222</td>
                                                                            <td>b.nash@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Caesar</td>
                                                                            <td>Vance</td>
                                                                            <td>Pre-Sales Support</td>
                                                                            <td>New York</td>
                                                                            <td>21</td>
                                                                            <td>2011/12/12</td>
                                                                            <td>$106,450</td>
                                                                            <td>8330</td>
                                                                            <td>c.vance@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Cara</td>
                                                                            <td>Stevens</td>
                                                                            <td>Sales Assistant</td>
                                                                            <td>New York</td>
                                                                            <td>46</td>
                                                                            <td>2011/12/06</td>
                                                                            <td>$145,600</td>
                                                                            <td>3990</td>
                                                                            <td>c.stevens@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Cedric</td>
                                                                            <td>Kelly</td>
                                                                            <td>Senior Javascript Developer</td>
                                                                            <td>Edinburgh</td>
                                                                            <td>22</td>
                                                                            <td>2012/03/29</td>
                                                                            <td>$433,060</td>
                                                                            <td>6224</td>
                                                                            <td>c.kelly@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Charde</td>
                                                                            <td>Marshall</td>
                                                                            <td>Regional Director</td>
                                                                            <td>San Francisco</td>
                                                                            <td>36</td>
                                                                            <td>2008/10/16</td>
                                                                            <td>$470,600</td>
                                                                            <td>6741</td>
                                                                            <td>c.marshall@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Colleen</td>
                                                                            <td>Hurst</td>
                                                                            <td>Javascript Developer</td>
                                                                            <td>San Francisco</td>
                                                                            <td>39</td>
                                                                            <td>2009/09/15</td>
                                                                            <td>$205,500</td>
                                                                            <td>2360</td>
                                                                            <td>c.hurst@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Dai</td>
                                                                            <td>Rios</td>
                                                                            <td>Personnel Lead</td>
                                                                            <td>Edinburgh</td>
                                                                            <td>35</td>
                                                                            <td>2012/09/26</td>
                                                                            <td>$217,500</td>
                                                                            <td>2290</td>
                                                                            <td>d.rios@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Donna</td>
                                                                            <td>Snider</td>
                                                                            <td>Customer Support</td>
                                                                            <td>New York</td>
                                                                            <td>27</td>
                                                                            <td>2011/01/25</td>
                                                                            <td>$112,000</td>
                                                                            <td>4226</td>
                                                                            <td>d.snider@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Doris</td>
                                                                            <td>Wilder</td>
                                                                            <td>Sales Assistant</td>
                                                                            <td>Sidney</td>
                                                                            <td>23</td>
                                                                            <td>2010/09/20</td>
                                                                            <td>$85,600</td>
                                                                            <td>3023</td>
                                                                            <td>d.wilder@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Finn</td>
                                                                            <td>Camacho</td>
                                                                            <td>Support Engineer</td>
                                                                            <td>San Francisco</td>
                                                                            <td>47</td>
                                                                            <td>2009/07/07</td>
                                                                            <td>$87,500</td>
                                                                            <td>2927</td>
                                                                            <td>f.camacho@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Fiona</td>
                                                                            <td>Green</td>
                                                                            <td>Chief Operating Officer (COO)</td>
                                                                            <td>San Francisco</td>
                                                                            <td>48</td>
                                                                            <td>2010/03/11</td>
                                                                            <td>$850,000</td>
                                                                            <td>2947</td>
                                                                            <td>f.green@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Garrett</td>
                                                                            <td>Winters</td>
                                                                            <td>Accountant</td>
                                                                            <td>Tokyo</td>
                                                                            <td>63</td>
                                                                            <td>2011/07/25</td>
                                                                            <td>$170,750</td>
                                                                            <td>8422</td>
                                                                            <td>g.winters@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Gavin</td>
                                                                            <td>Joyce</td>
                                                                            <td>Developer</td>
                                                                            <td>Edinburgh</td>
                                                                            <td>42</td>
                                                                            <td>2010/12/22</td>
                                                                            <td>$92,575</td>
                                                                            <td>8822</td>
                                                                            <td>g.joyce@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Gavin</td>
                                                                            <td>Cortez</td>
                                                                            <td>Team Leader</td>
                                                                            <td>San Francisco</td>
                                                                            <td>22</td>
                                                                            <td>2008/10/26</td>
                                                                            <td>$235,500</td>
                                                                            <td>2860</td>
                                                                            <td>g.cortez@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Gloria</td>
                                                                            <td>Little</td>
                                                                            <td>Systems Administrator</td>
                                                                            <td>New York</td>
                                                                            <td>59</td>
                                                                            <td>2009/04/10</td>
                                                                            <td>$237,500</td>
                                                                            <td>1721</td>
                                                                            <td>g.little@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Haley</td>
                                                                            <td>Kennedy</td>
                                                                            <td>Senior Marketing Designer</td>
                                                                            <td>London</td>
                                                                            <td>43</td>
                                                                            <td>2012/12/18</td>
                                                                            <td>$313,500</td>
                                                                            <td>3597</td>
                                                                            <td>h.kennedy@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Hermione</td>
                                                                            <td>Butler</td>
                                                                            <td>Regional Director</td>
                                                                            <td>London</td>
                                                                            <td>47</td>
                                                                            <td>2011/03/21</td>
                                                                            <td>$356,250</td>
                                                                            <td>1016</td>
                                                                            <td>h.butler@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Herrod</td>
                                                                            <td>Chandler</td>
                                                                            <td>Sales Assistant</td>
                                                                            <td>San Francisco</td>
                                                                            <td>59</td>
                                                                            <td>2012/08/06</td>
                                                                            <td>$137,500</td>
                                                                            <td>9608</td>
                                                                            <td>h.chandler@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Hope</td>
                                                                            <td>Fuentes</td>
                                                                            <td>Secretary</td>
                                                                            <td>San Francisco</td>
                                                                            <td>41</td>
                                                                            <td>2010/02/12</td>
                                                                            <td>$109,850</td>
                                                                            <td>6318</td>
                                                                            <td>h.fuentes@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Howard</td>
                                                                            <td>Hatfield</td>
                                                                            <td>Office Manager</td>
                                                                            <td>San Francisco</td>
                                                                            <td>51</td>
                                                                            <td>2008/12/16</td>
                                                                            <td>$164,500</td>
                                                                            <td>7031</td>
                                                                            <td>h.hatfield@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Jackson</td>
                                                                            <td>Bradshaw</td>
                                                                            <td>Director</td>
                                                                            <td>New York</td>
                                                                            <td>65</td>
                                                                            <td>2008/09/26</td>
                                                                            <td>$645,750</td>
                                                                            <td>1042</td>
                                                                            <td>j.bradshaw@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Jena</td>
                                                                            <td>Gaines</td>
                                                                            <td>Office Manager</td>
                                                                            <td>London</td>
                                                                            <td>30</td>
                                                                            <td>2008/12/19</td>
                                                                            <td>$90,560</td>
                                                                            <td>3814</td>
                                                                            <td>j.gaines@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Jenette</td>
                                                                            <td>Caldwell</td>
                                                                            <td>Development Lead</td>
                                                                            <td>New York</td>
                                                                            <td>30</td>
                                                                            <td>2011/09/03</td>
                                                                            <td>$345,000</td>
                                                                            <td>1937</td>
                                                                            <td>j.caldwell@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Jennifer</td>
                                                                            <td>Chang</td>
                                                                            <td>Regional Director</td>
                                                                            <td>Singapore</td>
                                                                            <td>28</td>
                                                                            <td>2010/11/14</td>
                                                                            <td>$357,650</td>
                                                                            <td>9239</td>
                                                                            <td>j.chang@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Jennifer</td>
                                                                            <td>Acosta</td>
                                                                            <td>Junior Javascript Developer</td>
                                                                            <td>Edinburgh</td>
                                                                            <td>43</td>
                                                                            <td>2013/02/01</td>
                                                                            <td>$75,650</td>
                                                                            <td>3431</td>
                                                                            <td>j.acosta@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Jonas</td>
                                                                            <td>Alexander</td>
                                                                            <td>Developer</td>
                                                                            <td>San Francisco</td>
                                                                            <td>30</td>
                                                                            <td>2010/07/14</td>
                                                                            <td>$86,500</td>
                                                                            <td>8196</td>
                                                                            <td>j.alexander@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Lael</td>
                                                                            <td>Greer</td>
                                                                            <td>Systems Administrator</td>
                                                                            <td>London</td>
                                                                            <td>21</td>
                                                                            <td>2009/02/27</td>
                                                                            <td>$103,500</td>
                                                                            <td>6733</td>
                                                                            <td>l.greer@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Martena</td>
                                                                            <td>Mccray</td>
                                                                            <td>Post-Sales support</td>
                                                                            <td>Edinburgh</td>
                                                                            <td>46</td>
                                                                            <td>2011/03/09</td>
                                                                            <td>$324,050</td>
                                                                            <td>8240</td>
                                                                            <td>m.mccray@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Michael</td>
                                                                            <td>Silva</td>
                                                                            <td>Marketing Designer</td>
                                                                            <td>London</td>
                                                                            <td>66</td>
                                                                            <td>2012/11/27</td>
                                                                            <td>$198,500</td>
                                                                            <td>1581</td>
                                                                            <td>m.silva@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Michael</td>
                                                                            <td>Bruce</td>
                                                                            <td>Javascript Developer</td>
                                                                            <td>Singapore</td>
                                                                            <td>29</td>
                                                                            <td>2011/06/27</td>
                                                                            <td>$183,000</td>
                                                                            <td>5384</td>
                                                                            <td>m.bruce@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Michelle</td>
                                                                            <td>House</td>
                                                                            <td>Integration Specialist</td>
                                                                            <td>Sidney</td>
                                                                            <td>37</td>
                                                                            <td>2011/06/02</td>
                                                                            <td>$95,400</td>
                                                                            <td>2769</td>
                                                                            <td>m.house@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Olivia</td>
                                                                            <td>Liang</td>
                                                                            <td>Support Engineer</td>
                                                                            <td>Singapore</td>
                                                                            <td>64</td>
                                                                            <td>2011/02/03</td>
                                                                            <td>$234,500</td>
                                                                            <td>2120</td>
                                                                            <td>o.liang@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Paul</td>
                                                                            <td>Byrd</td>
                                                                            <td>Chief Financial Officer (CFO)</td>
                                                                            <td>New York</td>
                                                                            <td>64</td>
                                                                            <td>2010/06/09</td>
                                                                            <td>$725,000</td>
                                                                            <td>3059</td>
                                                                            <td>p.byrd@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Prescott</td>
                                                                            <td>Bartlett</td>
                                                                            <td>Technical Author</td>
                                                                            <td>London</td>
                                                                            <td>27</td>
                                                                            <td>2011/05/07</td>
                                                                            <td>$145,000</td>
                                                                            <td>3606</td>
                                                                            <td>p.bartlett@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Quinn</td>
                                                                            <td>Flynn</td>
                                                                            <td>Support Lead</td>
                                                                            <td>Edinburgh</td>
                                                                            <td>22</td>
                                                                            <td>2013/03/03</td>
                                                                            <td>$342,000</td>
                                                                            <td>9497</td>
                                                                            <td>q.flynn@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Rhona</td>
                                                                            <td>Davidson</td>
                                                                            <td>Integration Specialist</td>
                                                                            <td>Tokyo</td>
                                                                            <td>55</td>
                                                                            <td>2010/10/14</td>
                                                                            <td>$327,900</td>
                                                                            <td>6200</td>
                                                                            <td>r.davidson@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Sakura</td>
                                                                            <td>Yamamoto</td>
                                                                            <td>Support Engineer</td>
                                                                            <td>Tokyo</td>
                                                                            <td>37</td>
                                                                            <td>2009/08/19</td>
                                                                            <td>$139,575</td>
                                                                            <td>9383</td>
                                                                            <td>s.yamamoto@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Serge</td>
                                                                            <td>Baldwin</td>
                                                                            <td>Data Coordinator</td>
                                                                            <td>Singapore</td>
                                                                            <td>64</td>
                                                                            <td>2012/04/09</td>
                                                                            <td>$138,575</td>
                                                                            <td>8352</td>
                                                                            <td>s.baldwin@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Shad</td>
                                                                            <td>Decker</td>
                                                                            <td>Regional Director</td>
                                                                            <td>Edinburgh</td>
                                                                            <td>51</td>
                                                                            <td>2008/11/13</td>
                                                                            <td>$183,000</td>
                                                                            <td>6373</td>
                                                                            <td>s.decker@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Shou</td>
                                                                            <td>Itou</td>
                                                                            <td>Regional Marketing</td>
                                                                            <td>Tokyo</td>
                                                                            <td>20</td>
                                                                            <td>2011/08/14</td>
                                                                            <td>$163,000</td>
                                                                            <td>8899</td>
                                                                            <td>s.itou@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Sonya</td>
                                                                            <td>Frost</td>
                                                                            <td>Software Engineer</td>
                                                                            <td>Edinburgh</td>
                                                                            <td>23</td>
                                                                            <td>2008/12/13</td>
                                                                            <td>$103,600</td>
                                                                            <td>1667</td>
                                                                            <td>s.frost@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Suki</td>
                                                                            <td>Burks</td>
                                                                            <td>Developer</td>
                                                                            <td>London</td>
                                                                            <td>53</td>
                                                                            <td>2009/10/22</td>
                                                                            <td>$114,500</td>
                                                                            <td>6832</td>
                                                                            <td>s.burks@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Tatyana</td>
                                                                            <td>Fitzpatrick</td>
                                                                            <td>Regional Director</td>
                                                                            <td>London</td>
                                                                            <td>19</td>
                                                                            <td>2010/03/17</td>
                                                                            <td>$385,750</td>
                                                                            <td>1965</td>
                                                                            <td>t.fitzpatrick@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Thor</td>
                                                                            <td>Walton</td>
                                                                            <td>Developer</td>
                                                                            <td>New York</td>
                                                                            <td>61</td>
                                                                            <td>2013/08/11</td>
                                                                            <td>$98,540</td>
                                                                            <td>8327</td>
                                                                            <td>t.walton@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Tiger</td>
                                                                            <td>Nixon</td>
                                                                            <td>System Architect</td>
                                                                            <td>Edinburgh</td>
                                                                            <td>61</td>
                                                                            <td>2011/04/25</td>
                                                                            <td>$320,800</td>
                                                                            <td>5421</td>
                                                                            <td>t.nixon@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Timothy</td>
                                                                            <td>Mooney</td>
                                                                            <td>Office Manager</td>
                                                                            <td>London</td>
                                                                            <td>37</td>
                                                                            <td>2008/12/11</td>
                                                                            <td>$136,200</td>
                                                                            <td>7580</td>
                                                                            <td>t.mooney@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Unity</td>
                                                                            <td>Butler</td>
                                                                            <td>Marketing Designer</td>
                                                                            <td>San Francisco</td>
                                                                            <td>47</td>
                                                                            <td>2009/12/09</td>
                                                                            <td>$85,675</td>
                                                                            <td>5384</td>
                                                                            <td>u.butler@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Vivian</td>
                                                                            <td>Harrell</td>
                                                                            <td>Financial Controller</td>
                                                                            <td>San Francisco</td>
                                                                            <td>62</td>
                                                                            <td>2009/02/14</td>
                                                                            <td>$452,500</td>
                                                                            <td>9422</td>
                                                                            <td>v.harrell@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Yuri</td>
                                                                            <td>Berry</td>
                                                                            <td>Chief Marketing Officer (CMO)</td>
                                                                            <td>New York</td>
                                                                            <td>40</td>
                                                                            <td>2009/06/25</td>
                                                                            <td>$675,000</td>
                                                                            <td>6154</td>
                                                                            <td>y.berry@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="even">
                                                                            <td class="sorting_1">Zenaida</td>
                                                                            <td>Frank</td>
                                                                            <td>Software Engineer</td>
                                                                            <td>New York</td>
                                                                            <td>63</td>
                                                                            <td>2010/01/04</td>
                                                                            <td>$125,250</td>
                                                                            <td>7439</td>
                                                                            <td>z.frank@datatables.net</td>
                                                                        </tr>
                                                                        <tr class="odd">
                                                                            <td class="sorting_1">Zorita</td>
                                                                            <td>Serrano</td>
                                                                            <td>Software Engineer</td>
                                                                            <td>San Francisco</td>
                                                                            <td>56</td>
                                                                            <td>2012/06/01</td>
                                                                            <td>$115,000</td>
                                                                            <td>4389</td>
                                                                            <td>z.serrano@datatables.net</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-5">
                                                        <div class="dataTables_info" id="fixed-columns-datatable_info" role="status" aria-live="polite">Showing 1 to 57 of 57 entries</div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-7"></div>
                                                </div>
                                            </div>
                                        </div> <!-- end preview-->

                                        <div class="tab-pane" id="fixed-columns-code">
                                            <pre class="mb-0">                                                    <span class="html escape hljs xml"><span class="hljs-tag">&lt;<span class="hljs-name">table</span> <span class="hljs-attr">id</span>=<span class="hljs-string">"fixed-columns-datatable"</span> <span class="hljs-attr">class</span>=<span class="hljs-string">"table nowrap row-border order-column w-100"</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">thead</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>First name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Last name<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Position<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Office<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Age<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Start date<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Salary<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>Extn.<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">th</span>&gt;</span>E-mail<span class="hljs-tag">&lt;/<span class="hljs-name">th</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">thead</span>&gt;</span><br>    <span class="hljs-tag">&lt;<span class="hljs-name">tbody</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tiger<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Nixon<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>System Architect<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Edinburgh<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>61<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/04/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$320,800<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>5421<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>t.nixon@datatables.net<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>        <span class="hljs-tag">&lt;<span class="hljs-name">tr</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Garrett<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Winters<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Accountant<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>Tokyo<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>63<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>2011/07/25<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>$170,750<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>8422<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>            <span class="hljs-tag">&lt;<span class="hljs-name">td</span>&gt;</span>g.winters@datatables.net<span class="hljs-tag">&lt;/<span class="hljs-name">td</span>&gt;</span><br>        <span class="hljs-tag">&lt;/<span class="hljs-name">tr</span>&gt;</span><br>    <span class="hljs-tag">&lt;/<span class="hljs-name">tbody</span>&gt;</span><br><span class="hljs-tag">&lt;/<span class="hljs-name">table</span>&gt;</span></span>
                                                </pre> <!-- end highlight-->
                                        </div> <!-- end preview code-->
                                    </div> <!-- end tab-content-->
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->
                </div>

            </div> <!-- content -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
    <?php include '../includes/endbar.php' ?>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <?php include '../includes/footer.php'; ?>

<?php } else {
    header("location: ../views/pages-404.php");
    exit();
} ?>