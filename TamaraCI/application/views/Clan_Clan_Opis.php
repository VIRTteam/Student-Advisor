
   <!-- extra div for emulating position:fixed of the menu -->
    <div class="st-content-inner">
      <div class="container">

        <div class="cover profile">
          <div class="wrapper">
            <div class="image hidden-xs">
              <table><td width="600" height="60"/></table>
            </div>    
          </div>
          <div class="cover-info">
            <div class="avatar">
              <img src="./img/woman-4.jpg" alt="people">
            </div>
            <div class="name"><h2><font color="#105DC1">Relja Veinovic</font></h2></div>
              <ul class="cover-nav">
                <li><a href="nasiHTLMovi/Clan_Clan_Profil.html"><i class="fa fa-fw fa-user"></i> Profil</a></li>
                <li class="active"><a href="Clan_Clan_Opis.php"><i class="fa fa-fw fa-info-circle"></i> Opis</a></li>
                <li><a href="nasiHTLMovi/Clan_Clan_Poruke.html"><i class="fa fa-fw fa-envelope"></i> Kontaktiraj</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="tabbable">
            <ul class="nav nav-tabs" tabindex="0" style="overflow: hidden; outline: none;">
              <li class="active">
                <a href="Clan_Clan_Opis.php#oKorisniku" data-toggle="tab"><i class="fa fa-fw fa-folder"></i> O korisniku</a>
              </li>
              <li class="">
                <a href="Clan_Clan_Opis.php#slika" data-toggle="tab"><i class="fa fa-fw fa-picture-o"></i> Slika</a>
              </li>
            </ul>
            <div class="tab-content">

              <div class="tab-pane fade " id="slika">
                <img src="./img/food1.jpg" alt="image">
              </div>

              <div class="tab-pane fade active in" id="oKorisniku">
                <div class="row">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading panel-heading-gray">
                        <i class="fa fa-fw fa-info-circle"></i> O korisniku
                      </div>
                      <div class="panel-body">
                        <ul class="list-unstyled profile-about margin-none">
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Ime</span></div>
                              <div class="col-sm-8">Miami, FL, USA</div>
                            </div>
                          </li>   
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Prezime</span></div>
                              <div class="col-sm-8">Miami, FL, USA</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">E-Mail</span></div>
                              <div class="col-sm-8">Miami, FL, USA</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Datum rođenja</span></div>
                              <div class="col-sm-8">12 January 1990</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Posao</span></div>
                              <div class="col-sm-8">Specialist</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Pol</span></div>
                              <div class="col-sm-8">Male</div>
                            </div>
                          </li>
                          <li class="padding-v-5">
                            <div class="row">
                              <div class="col-sm-4"><span class="text-muted">Mesto</span></div>
                              <div class="col-sm-8">Miami, FL, USA</div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

	    </div>
    </div>
 

    <div class="modal fade" id="myModal5" role="dialog">
      <div class="modal-dialog">
    
      <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Poruka će se proslediti nekom od Administratora</h4>
          </div>
          <div class="modal-body">
            <p>Unesite problem koji imate</p>
            <textarea rows="4" cols="50">
            Problem . . .
        </textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Pošalji</button>
            <button type="button" class="btn btn-white" data-dismiss="modal">Odustani</button>
          </div>
        </div>
        
      </div>
    </div>
