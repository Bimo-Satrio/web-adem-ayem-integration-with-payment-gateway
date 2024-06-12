<div>

    @include('livewire.pemilik.modal-edit-profile-pemilik')

    <div class="card">
            <div class="card-body">
                 <h2 class="text-center">{{ Auth::user()->name }}</h2>






        <div class="text-center">
            <img class="img-thumbnail" width="200px" height="200px"
            @if (Auth::user()->avatar == NULL)
            src="https://ui-avatars.com/api/?name={{Auth::user()->username}}&rounded=true"/>
            @else
            <img class="img-thumbnail" src="{{ asset(Auth::user()->avatar) }}" alt=""/>
            @endif
         </div>

<div class="text-center">

    <div class="my-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaleditProfilePemilik" wire:click="editProfile('{{Auth::user()->id_user}}')">Ubah Profile</button>
     </div>
</div>



<div  class="text-center">

         <div class="my-4">
             Username :        {{ Auth::user()->username }}
         </div>


         <div class="my-4">

             Nama Lengkap :         {{  Auth::user()->nama_lengkap  }}

         </div>

         <div class="my-4">
            Email :       {{ Auth::user()->email }}
         </div>


         <div class="my-4">
            Nomor Telefon :{{ Auth::user()->no_telefon }}
        </div>

</div>

    </div>
</div>


