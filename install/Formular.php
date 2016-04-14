<?php
    defined("INSTALL") or die;
?>
<div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datenbank-Eingaben</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="index.php">
                                <div class="form-group">
                                  <label for="inputHost" class="col-sm-4 control-label">Host</label>
                                  <div class="col-sm-8">
                                    <input type="value" class="form-control" id="inputHost" name="inputHost" placeholder="Host">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputUser" class="col-sm-4 control-label">Benutzername</label>
                                  <div class="col-sm-8">
                                    <input type="value" class="form-control" id="inputUser" name="inputUser" placeholder="Benutzername">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputPassword" class="col-sm-4 control-label">Passwort</label>
                                  <div class="col-sm-8">
                                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Passwort">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputDbName" class="col-sm-4 control-label">Datanbankname</label>
                                  <div class="col-sm-8">
                                    <input type="value" class="form-control" id="inputDbName" name="inputDbName" placeholder="Datenbank">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-default">Speichern</button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

