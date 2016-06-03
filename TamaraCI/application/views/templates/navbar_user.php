<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
    <form class="col-xs-10 col-md-6 item row" align="left"  style="margin-left: 0px" class="navbar-form margin-none navbar-left row">

        <div class="select2 col-xs-2 col-md-3" style="display: inline-block" >
            <select class="form-control" style="margin-top: 8px" name="selectIndex">
                <option selected>Kursevi</option>
                <option>Članovi</option>
                <option>Predavači</option>
            </select>
        </div>

        <div class="search-1 col-md-8 col-xs-8 "style="display: inline-block" style="padding: 0px">
            <!--  <span class="input-group-addon"><i class="icon-search"></i></span> -->
            <input type="text"  name="selectText" class="form-control" placeholder="Pretraga" >
        </div>

        <div class="col-xs-2 col-md-1 " style="margin-top: 8px " >
            <a  class="btn btn-white  " size="15px" height="10px"style="display: inline-block">
                <i class="fa fa-fw fa-search"> </i>
            </a>
        </div>
    </form>

    <form class="col-xs-2 col-md-6 item" align="right"  style="margin-left: 0px" class="navbar-form margin-none navbar-right row">

        <ul align="right" class="nav navbar-nav  navbar-right ">
            <li class="dropdown" >
                <a class="dropdown-toggle user" data-toggle="dropdown">
                    <img src="./img/guy-5.jpg" alt="Bill" class="img-circle" width="40" /img>
                    <span class="hidden-sm hidden-xs">Isidora </span>
                    <span class="caret hidden-sm hidden-xs"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="nasiHTLMovi/Clan_MojProfil_Profil.html">Profil</a></li>
                    <li><a href="nasiHTLMovi/Clan_Clan_Poruke.html">Poruke</a></li>
                    <li><a href="nasiHTLMovi/Clan_MojProfil_Opis.html">Izmeni profil</a></li>
                    <li><a href="" data-toggle="modal" data-target="#myModal15">Pomoć</a></li>
                    <li><a href="nasiHTLMovi/Gost_Registracija.html">Izloguj se</a></li>
                </ul>
            </li>
        </ul>
    </form>
</div>