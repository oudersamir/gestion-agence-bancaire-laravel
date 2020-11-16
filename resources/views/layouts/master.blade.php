<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
 

    <title></title>

<script src="{{asset('assets/js/sweetalert2.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('assets/js/jquery.min.js')}}"> </script>
<!--<script type="text/javascript" src="{{asset('assets/scripts/jquery-2.2.0.min.js')}}"></script>-->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>

<!--script type="text/javascript"  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"/-->
<script type="text/javascript" src="{{asset('assets/scripts/mmenu.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/chosen.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/scripts/stupidtable.min.js')}}"></script>  

<script type="text/javascript" language="JavaScript">
function  success1(message){
          Swal.fire({
  title: message,
  text: '',
  type: 'success',
  confirmButtonText: 'OK'
});
        }
        function  error1(message){
    Swal.fire({
  type: 'error',
  title: message,
  text: 'Something went wrong!',
  footer: '<a href>Why do I have this issue?</a>'
})   }
      </script>

    </head>
<link rel="stylesheet" href="{{asset('assets/htm/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/htm/css/colors/main.css')}}" id="colors">
    <link rel="stylesheet"  href="{{asset('css/theme6.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert2.min.css')}}">

          


    <body>
  <div id="header">
    <div class="container">
      
      <!-- Left Side Content -->
      <div class="left-side">
        
        <!-- Logo -->
        <div id="logo">

          <h3><a href="{{url('Accueil')}}"><b>Agence Bancaire</b>
<img src="{{asset('assets/htm/images/euroLogo.png')}}" alt=""></a></h3>
        </div>

        <!-- Mobile Navigation -->
        <div class="mmenu-trigger">
          <button class="hamburger hamburger--collapse" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>


        <!-- Main Navigation -->
        <nav id="navigation" class="style-1">
          <ul id="responsive">

            <li><a class="{{ Request::path() == 'Accueil' ? 'current' : '' }} "  href="{{url('Accueil')}}">Home</a>
              
            </li>

            <li><a class="{{ Request::path() == 'Clients' || Request::path() == 'Create_Client' || Request::is('Clients/*/Edit_Client') ? 'current' : '' }}"href="#">Mes Clients</a>
              <ul>
                 <li><a  href="{{url('Clients')}}">listes des clients</a></li>            
                <li><a href="{{url('Create_Client')}}">Nouveau Client</a> </li>
              </ul>
            </li>

            <li><a class="{{ Request::path() == 'Comptes' || Request::path() == 'Create_Compte' || Request::path() == 'Supprimer_Compte' ? 'current' : '' }}" href="#">Mes Comptes</a>
              <ul>
                <li><a href="{{ url('Comptes') }}">Comptes courants</a></li>
                <li><a href="{{ url('Supprimer_Compte') }}">Supprimer Compte</a></li>
               <li><a href="{{ url('Create_Compte') }}">Nouveau Compte</a></li>

              </ul>
            </li>

            <li><a class=" {{ Request::path() == 'Operations' || Request::path() == 'Effectuer_Viresement' ||  Request::path() == 'Effectuer_Virement' || Request::path() == 'Effectuer_Retrait' ? 'current' : '' }}" href="{{url('Effectuer_Virement')}}" href="#">Operations</a>
              <div class="mega-menu mobile-styles two-columns">

                  <div class="mega-menu-section">
                    <ul>
                      <li class="mega-menu-headline">Compte Courant</li>
                      <li><a href="{{ url('Effectuer_Virement') }}"><i class="sl sl-icon-settings"></i> Virement</a></li>
                      <li><a href="{{ url('Effectuer_Retrait') }}"><i class="sl sl-icon-settings"></i> Retrait</a></li>
                      <li><a href="{{ url('Effectuer_Viresement') }}"><i class="sl sl-icon-settings"></i> Versement</a></li>
                    </ul>
                  </div>
    
                  <div class="mega-menu-section">
                    <ul>
                      <li class="mega-menu-headline">Compte Epargne</li>
                      <li><a href="{{ url('Effectuer_Virement_epargne') }}"><i class="sl sl-icon-settings"></i> Virement</a></li>
                      <li><a href="{{ url('Effectuer_Retrait_Epargne') }}"><i class="sl sl-icon-settings"></i> Retrait</a></li>
                      <li><a href="{{ url('Effectuer_Viresement_Epargne') }}"><i class="sl sl-icon-settings"></i> Versement</a></li>
                    </ul>
                  </div>

                  
    
              </div>
            </li>
            
          </ul>
        </nav>
        <div class="clearfix"></div>
        <!-- Main Navigation / End -->
        
      </div>
      <!-- Left Side Content / End -->


      <!-- Right Side Content / End -->
      <div class="right-side">
        <div class="header-widget">
          <a href="{{ route('logout') }}  " class="sign-in popup-with-zoom-anim"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                          <i class="sl sl-icon-login"></i>  Déconnecter
                                        </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
          <a href="dashboard-add-listing.html" class="button border with-icon">Add Compte <i class="sl sl-icon-plus"></i></a>
        </div>
      </div>
      <!-- Right Side Content / End -->

      <!-- Sign In Popup -->

     

    </div>
  </div>
  


<div class="card text-center">

  
  <div class="card-body">
@yield('content')



</div>
</div>


 
       
 
@yield('javascripts')
 </body>

        </html>