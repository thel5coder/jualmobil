<ul class="cs-user-accounts-list">
    <li><a href="{{route('listing')}}">Daftar Mobil</a></li>
    <li><a href="{{route('formbuatiklan')}}">Buat Iklan Baru</a></li>
    <li><a href="{{route('berita')}}">Daftar Berita</a></li>
    <li><a href="{{route('formBerita')}}">Buat Berita Baru</a></li>
@if(auth()->user()->tipe_user == 'admin')
        <li><a href="{{route('formMerk')}}">Tambah Merk Baru</a></li>
        <li><a href="{{route('formModel')}}">Tambah Model Baru</a></li>
        <li ><a href="{{route('formTipe')}}">Tambah Tipe Baru</a></li>
    @endif
    <li><a href="{{route('dashboard')}}">Akun Saya</a></li>
    <li><a href="{{route('logout')}}">Logout</a></li>
</ul>