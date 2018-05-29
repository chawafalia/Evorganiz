<div class="col-md-3">
  <div class="box box-warning collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">Ajouter un contact</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">

        <form role="form" method="POST" action = <?php echo site_url('Contact/addContact')?> >
            <!-- text input -->
            <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control" name="lastnameContact" placeholder="Entrer ...">
            </div>

            <div class="form-group">
                <label>Prénom</label>
                <input type="text" class="form-control" name="firstnameContact" placeholder="Entrer ...">
            </div>
            
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="text" class="form-control" name="telephoneContact" placeholder="Téléphone">
            </div>
        
        <div class="box-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-warning">Valider</button>
        </div>

        </form>
    </div><!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Liste des contacts</h3>
                <div class="box-tools">
                    <div class="input-group">
                        <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-header -->


            <div class="box-body table-responsive">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row"><div class="col-xs-6"><div id="example1_length" class="dataTables_length">
                        <label>
                        <select size="1" name="example1_length" aria-controls="example1">
                            <option value="10" selected="selected">10</option><option value="25">25</option>
                            <option value="50">50</option><option value="100">100</option>
                        </select> records per page</label>


                    </div>
                </div>

            </div>

            <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                <thead><tr role="row">

                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nom</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" >Prénom</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Téléphone</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Rue</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Code Postal</th>

                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Ville</th>

                </tr></thead>
    
                
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    <?php
                        // Data recovery
                        $line = '';
                        foreach ($ListContact as $contact) {
                            $lastnameContact = $contact->lastnameContact;
                            $firstnameContact = $contact->firstnameContact;
                            $telContact = $contact->telContact;
                            $streetContact = $contact->streetContact;
                            $zipCodeContact = $contact->zipCodeContact;
                            $townContact = $contact->townContact;
                            
                            // for each loop iteration, a line contains all informations about one event
                            $line = '<tr>';
                            $line = $line . '<td>' . $lastnameContact  . '</td>';                  
                            $line = $line . '<td>' . $firstnameContact . '</td>';
                            $line = $line . '<td>' . $telContact       . '</td>';
                            $line = $line . '<td>' . $streetContact    . '</td>';
                            $line = $line . '<td>' . $zipCodeContact   . '</td>';
                            $line = $line . '<td>' . $townContact      . '</td>';

                            // Add a button to delete or edit an event
                            // $line = $line . '<td class="row">';

                            ////////to do buttton 

                            $line = $line . '</tr>';
                            
                            echo  $line;
                        }
                    ?>
                </tbody>
            </table>

            <div class="row">
                <div class="col-xs-6">
                    <div class="dataTables_info" id="example1_info">Showing 1 to 10 of 57 entries</div>
                </div>

                <div class="col-xs-6">
                    <ul class="pagination pagination-sm margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>

