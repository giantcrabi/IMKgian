<body>    
    <div class="container-fluid" id="head">
        <div class="row" id="head-row">
            <div class="col-md-6">
                <a href="<?php echo base_url(""); ?>"><img src="<?php echo base_url('uploads/Findoct-red.png'); ?>" alt="iconFindoct" width="100px" height="100px"></a>
                <h2 style="font-family: bebas neue;">Findoct</h2>
            </div>

            <div class="col-md-6" id="head-right">
                <h3>Find Doctors Anywhere Anytime</h3>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    
                </button>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!--
                    <li class="dropdown">
                      <button class="dropbtn">Pencarian Dokter</button>
                      <div class="dropdown-content">
                        <a href="<?php echo base_url("/maps/dr.Umum"); ?>">Umum</a>
                        <a href="<?php echo base_url("/nyoba/test"); ?>">Spesialis</a>
                        <a href="#">Penyakit</a>
                    </div>
                    </li>
                    -->
                
                    <li><a href="<?php echo base_url("/maps"); ?>">Pencarian Dokter</a></li>
                    <li><a href="<?php echo base_url("/doctors"); ?>">Dokter</a></li>
                    <li><a href="<?php echo base_url("/tempatpraktik"); ?>">Tempat Praktek</a></li>
                </ul>
            
        </div>
    </div>
</nav>