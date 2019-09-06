@extends('layouts.index')

@section('content')
<div id="main">
    <div class="row">
        <div class="col s12">
            <div class="container">
                {{-- <div class="card">
                    <div class="card-content">
                        <p class="caption mb-0">
                            <code>From: Kampoeng Jakarta Deket Sentiong</code> <hr />
                            Haloo Selamat Datang Di Jakarta, Kamu yang baru pulang kerja. 
                            semangat ya belajarnya. jangan jenuh-jenuh. <b>always be grateful  :) <b />
                            <br /><br /><br />btw udah wangi kan ya... 
                        </p>
                    </div>
                </div> --}}

                {{-- <div class="col s12">
                  <div class="card animate fadeLeft">
                     <div class="card-content">
                        <h4 class="card-title mb-0">Haloo Eneng / Ncip / Thiara / Cochocip, pules banget tidurnya :'(</h4>
                     </div>
                  </div>
               </div> --}}

               {{-- <div class="col s12">
                  <div class="card animate fadeLeft">
                     <div class="card-content">
                        <h4 class="card-title mb-0">Holaa Cochocip, Istirahat yaa . mimpi indah. :* <br /> aplikasi nya jangan dipikirin , InsyaAllah tau2 udah kelar :D</h4>
                     </div>
                  </div>
               </div> --}}

               <div class="col s12 m4 l4">
                  <!-- Current Balance -->
                  <div class="card animate fadeLeft">
                     <div class="card-content">
                        <h4 class="card-title mb-0">Jumlah Guru <i class="material-icons float-right">more_vert</i></h4>
                        <p class="medium-small">Total Data</p>
                        <div class="current-balance-container">
                           <div id="current-balance-donut-chart" class="current-balance-shadow"></div>
                        </div>
                        <h5 class="center-align">10</h5>
                        <p class="medium-small center-align">Orang</p>
                     </div>
                  </div>
               </div>

               <div class="col s12 m4 l4">
                  <!-- Current Balance -->
                  <div class="card animate fadeLeft">
                     <div class="card-content">
                        <h4 class="card-title mb-0">Jumlah TU <i class="material-icons float-right">more_vert</i></h4>
                        <p class="medium-small">Total Data</p>
                        <div class="current-balance-container">
                           <div id="current-balance-donut-chart" class="current-balance-shadow"></div>
                        </div>
                        <h5 class="center-align">10</h5>
                        <p class="medium-small center-align">Orang</p>
                     </div>
                  </div>
               </div>

               <div class="col s12 m4 l4">
                  <!-- Current Balance -->
                  <div class="card animate fadeLeft">
                     <div class="card-content">
                        <h4 class="card-title mb-0">Jumlah Satpam <i class="material-icons float-right">more_vert</i></h4>
                        <p class="medium-small">Total Data</p>
                        <div class="current-balance-container">
                           <div id="current-balance-donut-chart" class="current-balance-shadow"></div>
                        </div>
                        <h5 class="center-align">10</h5>
                        <p class="medium-small center-align">Orang</p>
                     </div>
                  </div>
               </div>

               <div class="col s12 m4 l4">
                  <!-- Current Balance -->
                  <div class="card animate fadeLeft">
                     <div class="card-content">
                        <h4 class="card-title mb-0">Jumlah Petugas Kebersihan <i class="material-icons float-right">more_vert</i></h4>
                        <p class="medium-small">Total Data</p>
                        <div class="current-balance-container">
                           <div id="current-balance-donut-chart" class="current-balance-shadow"></div>
                        </div>
                        <h5 class="center-align">10</h5>
                        <p class="medium-small center-align">Orang</p>
                     </div>
                  </div>
               </div>

               <div class="col s12 m4 l4">
                  <!-- Current Balance -->
                  <div class="card animate fadeLeft">
                     <div class="card-content">
                        <h4 class="card-title mb-0">Teknisi <i class="material-icons float-right">more_vert</i></h4>
                        <p class="medium-small">Total Data</p>
                        <div class="current-balance-container">
                           <div id="current-balance-donut-chart" class="current-balance-shadow"></div>
                        </div>
                        <h5 class="center-align">10</h5>
                        <p class="medium-small center-align">Orang</p>
                     </div>
                  </div>
               </div>

               <div class="col s12">
                  <!-- Current Balance -->
                  <div class="card animate fadeRight">
                     <div class="card-content">
                        <h4 class="card-title mb-0">Selamat Datang Di Sistem Informasi Manajemen Arsip Kepegawaian MAN 1 Kota Bekasi</h4>
                     </div>
                  </div>
               </div>

                

               {{-- Biodata Sekolah --}}
               {{-- <div class="col s12">
                    <div class="card animae fadeRight">
                            <div class="card-content">
                            <div class="card-title">Biodata Sekolah</div>
                            <table >
                                <tr class="Highlight">
                                    <td col="6">
                                        Nama Sekolah
                                    </td>
                                    <td col="6">
                                        MAN 1
                                    </td>
                                </tr>
                                <tr>
                                    <td col="6">
                                        Alamat Sekolah
                                    </td>
                                    <td col="6">
                                        Bekasi jauh disana
                                    </td>
                                </tr>
                                <tr>
                                    <td col="6">
                                        Status Sekolah
                                    </td>
                                    <td col="6">
                                        Masih Oke Lah
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

               </div> --}}
            </div>
        </div>
    </div>
</div>
  
@endsection