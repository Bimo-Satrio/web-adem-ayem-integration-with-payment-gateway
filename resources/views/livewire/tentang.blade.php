<div>
    @forelse($tentangAdemAyem as $tentang)
    <div class="card">
        <div class="card-body"></div>
      </div>

    @empty
  <div class="card">
    <div class="card-body"></div>
  </div>


    @endforelse
</div>
