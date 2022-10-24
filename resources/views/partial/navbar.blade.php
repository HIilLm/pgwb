 <!-- navbar -->
 <div class="container mb-5">
     <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top mb-5" style="background-color: rgb(209, 94, 0)">
         <div class="container">
             {{-- <a class="navbar-brand" href="/">{{ Auth::user()->name }}</a> --}}
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                 aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav ms-auto">
                     <li class="nav-item">
                         <a class="nav-link {{ $page === 'Profil' ? 'active' : '' }} " aria-current="page"
                             href="/">Home</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ $page === 'About' ? 'active' : '' }}" href="/about">About</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ $page === 'Projects' ? 'active' : '' }}" href="/projects">Projects</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ $page === 'Contact' ? 'active' : '' }}" href="/contact">Contact me</a>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
 </div>
 <!--akhir navbar-->
