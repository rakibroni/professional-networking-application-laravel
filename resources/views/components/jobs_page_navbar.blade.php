<!-- NAVBAR -->

<nav id="jobs_page_navbar" class="no-tran fixed-top navbar navbar-expand-xl navbar-light bg-light trans-navigation bg-trans"
  style="top: -200px;">
  <div class="container">

    <a onclick="loadSearchPage()" class="pointer-on-hover mx-1 mx-md-2 mx-lg-0 navbar-brand" >
      <img src="{{ asset('images/schrift.svg') }}" alt="" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="mt-1 collapse navbar-collapse flex-grow-1 text-right" id="navbarNav">
      <ul class="navbar-nav ms-auto flex-nowrap">
        <li class="nav-item mx-xl-2 mx-3 ">
          <div class="position-relative">
            <div class="nav-link pointer-on-hover unselectable" onclick="loadSearchPage()">Talente suchen</div>
            <div class="jobs-navbar-indicator" id="talentsearch_indicator"></div>
          </div>
        </li>
        <li class="nav-item mx-xl-2 mx-3 ">
          <div class="position-relative">
            <div class="nav-link pointer-on-hover unselectable" onclick="loadOpenPositionsPage()">Offene Positionen</div>
            <div class="jobs-navbar-indicator" id="openpositions_indicator"></div>
          </div>
        </li>

        <li class="nav-item dropdown mx-3 ">
          <div class="position-relative">
            <a class="nav-link dropdown-toggle unselectable" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Einladungen
            </a>
            <div class="jobs-navbar-indicator" id="invites_indicator"></div>
            <ul id="navDrop" class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a onclick="hideNavDropdown(); loadInvitesPage('invited');" class="dropdown-item">Eingeladene
                  Talente</a></li>
              <li>
              <li><a onclick="hideNavDropdown(); loadInvitesPage('accepted');" class="dropdown-item">Angenommene
                  Talente</a></li>
              <li>
              <li><a onclick="hideNavDropdown(); loadInvitesPage('rejected');" class="dropdown-item">Abgelehnte
                  Talente
                </a></li>
              <li>
            </ul>
          </div>
        </li>
        <li class="nav-item mx-xl-2 mx-3 ">
          <div class="position-relative" onclick="loadMessagesPage()">
            <a class="nav-link pointer-on-hover unselectable">Nachrichten</a>
            <div class="jobs-navbar-indicator" id="messages_indicator"></div>
          </div>
        </li>

        <li class="nav-item dropdown mx-3 ">
          <div class="position-relative">
            <a class="nav-link dropdown-toggle unselectable" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Profil
            </a>
            <div class="jobs-navbar-indicator" id="profile_indicator"></div>
            <ul id="navDrop" class="dropdown-menu" aria-labelledby="navbarDropdown1">
              <li><a onclick="hideNavDropdown(); loadCompanyPage('{{ auth()->user()->username }}')"
                  class="dropdown-item">Unternehmensprofil</a></li>
              <li>
                <form  action="{{ route('logout') }}" method="post" type="sumbit" onclick="">
                  @csrf<button class="dropdown-item" style="color:#808080">Ausloggen</button>
                </form>
              </li>
          </div>
        </li>

      </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>


