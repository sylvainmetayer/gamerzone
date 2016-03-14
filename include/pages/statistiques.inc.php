
<?php
$pdo = new Mypdo();
$manager = new FactureManager($pdo);
$clientManager = new ClientManager($pdo);
if (isset($_GET['idCommande'])) {
    $articleManager = new ArticleManager($pdo);
    $resu = $manager->get($_GET['idCommande']);
?>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                        <h2 class="post-title">
                            Statistiques CA
                        </h2>

                        <div id="graph">Loading graph...</div>

                        <script type="text/javascript">
                        	var myData = new Array([CA,date]);
                          <?php
                          $commandes = new Array();
                          $commandes = getAll();

                          ?>
                        	var myChart = new JSChart('graph', 'line');
                        	myChart.setDataArray(myData);
                        	myChart.setTitle("Chiffre d'affaire");
                        	myChart.setTitleColor('#8E8E8E');
                        	myChart.setTitleFontSize(11);
                        	myChart.setAxisNameX('');
                        	myChart.setAxisNameY('');
                        	myChart.setAxisColor('#C4C4C4');
                        	myChart.setAxisValuesColor('#343434');
                        	myChart.setAxisPaddingLeft(100);
                        	myChart.setAxisPaddingRight(120);
                        	myChart.setAxisPaddingTop(50);
                        	myChart.setAxisPaddingBottom(40);
                        	myChart.setAxisValuesNumberX(6);
                        	myChart.setGraphExtend(true);
                        	myChart.setGridColor('#c2c2c2');
                        	myChart.setLineWidth(6);
                        	myChart.setLineColor('#9F0505');
                        	myChart.setSize(616, 321);
                        	myChart.setBackgroundImage('img/chart_bg.jpg');
                        	myChart.draw();
                        </script>

                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
