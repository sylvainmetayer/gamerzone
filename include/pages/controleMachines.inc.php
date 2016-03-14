  <link rel="stylesheet" href="css/style.css"/>
  <link href="css/toastr.css" rel="stylesheet"/>
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/toastr.js"></script>
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
              <div class="post-preview">
                <div class="tabs">
                  <ul class="tab-links">
                      <li class="active"><a href="#tab1">Salle 1</a></li>
                      <li><a href="#tab2">Salle 2</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="tab1" class="tab active">
                      <h1>Salle n°1</h1>
                      <div class="conteneur">
                        <div id="m1" class="machine">
                        </div>
                        <input type="button" value="Réparer !" class="reparer" />
                      </div>

                      <div class="conteneur">
                        <div id="m2" class="machine">
                        </div>
                        <input type="button" value="Réparer !" class="reparer" />
                      </div>

                      <div class="conteneur">
                        <div id="m3" class="machine">
                        </div>
                        <input type="button" value="Réparer !" class="reparer"/>
                      </div>
                    </div>

                      <div id="tab2" class="tab">
                        <h1>Salle n°2</h1>
                          <div class="conteneur">
                            <div id="m4" class="machine">
                            </div>
                            <input type="button" value="Réparer !" class="reparer"/>
                          </div>

                      </div>

                  </div>
              </div>
            </div>

        </div>

    </div>
</div>
  <script src="js/controleMachines.js"></script>
</body>
</html>


<!--  <div class="tabs">
    <ul class="tab-links">
      <li>Salle 1</li>
      <li>Salle 2</li>
    </ul>

    <div id="salle1" class="salle tab active">
      <h1>Salle n°1</h1>
      <div class="conteneur">
        <div id="m1" class="machine">
          <img src="loading.gif" alt="chargement" />
        </div>
        <input type="button" value="Réparer !" class="reparer" />
      </div>

      <div class="conteneur">
        <div id="m2" class="machine">
          <img src="loading.gif" alt="chargement" />
        </div>
        <input type="button" value="Réparer !" class="reparer" />
      </div>

      <div class="conteneur">
        <div id="m3" class="machine">
          <img src="loading.gif" alt="chargement" />
        </div>
        <input type="button" value="Réparer !" class="reparer"/>
      </div>
    </div>
  </div>-->
