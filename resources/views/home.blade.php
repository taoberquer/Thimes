@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Main Content -->
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                      <div class="post-preview">
                        <a href="post.html">
                          <h2 class="post-title">
                            Man must explore, and this is exploration at its greatest
                          </h2>
                          <h3 class="post-subtitle">
                            Problems look mighty small from 150 miles up
                          </h3>
                        </a>
                        <p class="post-meta">Posted by
                          <a href="#">Start Bootstrap</a>
                          on September 24, 2019</p>
                      </div>
                      <hr>
                      <div class="post-preview">
                        <a href="post.html">
                          <h2 class="post-title">
                            I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
                          </h2>
                        </a>
                        <p class="post-meta">Posted by
                          <a href="#">Start Bootstrap</a>
                          on September 18, 2019</p>
                      </div>
                      <hr>
                      <div class="post-preview">
                        <a href="post.html">
                          <h2 class="post-title">
                            Science has not yet mastered prophecy
                          </h2>
                          <h3 class="post-subtitle">
                            We predict too much for the next year and yet far too little for the next ten.
                          </h3>
                        </a>
                        <p class="post-meta">Posted by
                          <a href="#">Start Bootstrap</a>
                          on August 24, 2019</p>
                      </div>
                      <hr>
                      <div class="post-preview">
                        <a href="post.html">
                          <h2 class="post-title">
                            Failure is not an option
                          </h2>
                          <h3 class="post-subtitle">
                            Many say exploration is part of our destiny, but it’s actually our duty to future generations.
                          </h3>
                        </a>
                        <p class="post-meta">Posted by
                          <a href="#">Start Bootstrap</a>
                          on July 8, 2019</p>
                      </div>
                      <hr />
                      <div class="post-preview">
                        <a href="post.html">
                          <h2 class="post-title">
                            Failure is not an option
                          </h2>
                          <h3 class="post-subtitle">
                            Many say exploration is part of our destiny, but it’s actually our duty to future generations.
                          </h3>
                        </a>
                        <p class="post-meta">Posted by
                          <a href="#">Start Bootstrap</a>
                          on July 8, 2019</p>
                      </div>
                  </div>



     <div class="col-md-4">

         <!-- a voir si on garde la barre de recherche dans un aside ou on la place dans la navbar -->
       <div class="card my-4">
         <h5 class="card-header">Rechercher</h5>
         <div class="card-body">
           <div class="input-group">
             <input type="text" class="form-control" placeholder="Recherche pour...">
             <span class="input-group-btn">
               <button class="btn btn-secondary" type="button">Go!</button>
             </span>
           </div>
         </div>
       </div>



              <div class="card my-4">
                <h5 class="card-header">Sources</h5>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <ul class="list-unstyled mb-0">
                        <li>
                            <input type="checkbox" id="" value="" />
                            <a href="#">L'Est Républicain</a>
                        </li>
                        <li>
                            <input type="checkbox" id="" value="" />
                            <a href="#">Le Républicain Lorrain</a>
                        </li>
                        <li>
                            <input type="checkbox" id="" value="" />
                            <a href="#">Vosges Matin</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-lg-6">
                      <ul class="list-unstyled mb-0">
                        <li>
                           <input type="checkbox" id="" value="" />
                           <a href="#">Les Dernières Nouvelles d’Alsace</a>
                        </li>
                        <li>
                            <input type="checkbox" id="" value="" />
                            <a href="#">L’Alsace Le Pays</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>



       <div class="card my-4">
         <h5 class="card-header">Catégories</h5>
         <div class="card-body">
           <div class="row">
             <div class="col-lg-6">
               <ul class="list-unstyled mb-0">
                 <li>
                     <input type="checkbox" id="" value="" />
                     <a href="#">Football</a>
                 </li>
                 <li>
                     <input type="checkbox" id="" value="" />
                     <a href="#">Basketball</a>
                 </li>
                 <li>
                     <input type="checkbox" id="" value="" />
                     <a href="#">Tennis</a>
                 </li>
               </ul>
             </div>
             <div class="col-lg-6">
               <ul class="list-unstyled mb-0">
                 <li>
                    <input type="checkbox" id="" value="" />
                    <a href="#">Curling sur gazon</a>
                 </li>
                 <li>
                     <input type="checkbox" id="" value="" />
                     <a href="#">Badminton</a>
                 </li>
                 <li>
                     <input type="checkbox" id="" value="" />
                     <a href="#">Ski</a>
                 </li>
               </ul>
             </div>
           </div>
         </div>
       </div>


   </div>
   <!-- /.row -->

 </div>
 <!-- /.container -->



@endsection
