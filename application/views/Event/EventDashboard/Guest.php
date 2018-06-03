<div class="col-md-auto">
  <div class="box box-warning">
    <div class="box-header with-border">
      <i class="fa fa-group"></i> <h3 class="box-title">Invités</h3>

      <div class="box-tools pull-right">
        <a class="btn" data-toggle="modal" data-target="#addGuestModal" role="button"><i class="fa fa-plus"></i> Ajouter</a>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>

      
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      
        <div class="tab-content">
            
            <div class="box-body no-padding">
               
                <table class="table table-striped">
                    <tbody><tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Accepte invitation</th>
                        
                    </tr>
                  
                    <?php
                    // Data recovery
                    $line = '';
                    $numberGuest = 1;
                    
                    foreach ($guests as $guest) {

                        $idGuest = $guest->idContact;
                        $firstname = $guest->firstnameContact;
                        $lastname = $guest->lastnameContact;
                        $acceptInvitation = $guest->acceptInvitation;

                        // for each loop iteration, a line contains all informations about one guest
                        $line = '<tr>';

                        $line = $line  . '<td>' . $numberGuest . '. </td>';
                        $line = $line . '<td>' . $firstname . '</td>';
                        $line = $line . '<td>' . $lastname . '</td>';

                        if ($acceptInvitation=='Oui') {

                            $line = $line . '<td>' . '<small class="label label-success"><i class="fa fa-check"></i></small>' . '</td>';

                        } else {
                            $line = $line . '<td>';
                        }
                     
                        $line = $line . '<span class="pull-right">
                                                <a class="btn" data-toggle="modal" data-target="#deleteGuestModal_' . $idGuest .'" role="button"><i class="fa fa-trash-o"></i></a>
                                            </span> </td>';


                        $line = $line . '</tr>';

                        $numberGuest++;
                        echo  $line;


                        $modalDeleteGuest =
                            '<div class="modal fade" id="deleteGuestModal_' . $idGuest .'" tabindex="-1" role="dialog">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h5 class="modal-title"><b>Attention !</b></h5>
                                       
                                          </div>
                                          
                                          <form method="POST" action="' . site_url("Guest/deleteGuest?idEvent=" . $idEvent) . '">
                                              <div class="modal-body">
                                                    <p>Etes-vous sûr de vouloir supprimer cet invité ?</p>
                                                    <input type="hidden" name="idGuestToDelete" id="idGuestToDelete" value="'. $idGuest .'">
                                              </div>
                                              <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-warning">Valider</button>               
                                              </div>
                                         </form>
                                        </div>
                                      </div>
                                    </div>';
           
                        echo ($modalDeleteGuest);    

                        $list='';

                        foreach($listContactNotInvited as $contact) {

                            $list = $list . ' <option value="'. $contact->idContact .'">' . $contact->lastnameContact . ' ' . $contact->firstnameContact .'</option>';
                        }

                        $modalAddGuest = '<div class="modal fade" id="addGuestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter invité</h5>
                                                </div>
                                    
                                                <form method="POST" action="' . site_url("Guest/addGuest?idEvent=" . $idEvent) . '">
                                                    <div class="modal-body">

                                                    <div class="form-group">
                                                        <select required class="form-control" name="newuest">
                                                        
                                                        '. $list . 
                                                        '</select>
                                                    </div>

                                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-warning">Sauvegarder</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>';

                        echo $modalAddGuest;

                    }
                    ?>
                </tbody></table>
            </div>     
        </div>
    </div>
</div>