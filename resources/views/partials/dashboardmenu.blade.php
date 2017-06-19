<ul class="cs-user-accounts-list">
    <li><a href="{{route('listing')}}">Daftar Mobil</a></li>
    <li><a href="{{route('formbuatiklan')}}">Buat Iklan Baru</a></li>
    <li><a href="{{route('beritaBackend')}}">Daftar Berita</a></li>
    <li><a href="{{route('formBerita')}}">Buat Berita Baru</a></li>
    @if(auth()->user()->tipe_user == 'admin')
        <li><a href="{{route('formMerk')}}">Merk</a></li>
        <li><a href="{{route('formModel')}}">Model</a></li>
        <li><a href="{{route('formTipe')}}">Tipe</a></li>
        <li><a href="{{route('kategori')}}">Kategori</a></li>
    @endif
    <li><a href="{{route('dashboard')}}">Akun Saya</a></li>
    <li><a href="{{route('logout')}}">Logout</a></li>
</ul>