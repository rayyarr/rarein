<!DOCTYPE html>
<html>
<meta charset='UTF-8' />
<meta content='width=device-width, initial-scale=1, user-scalable=1, minimum-scale=1, maximum-scale=5'
    name='viewport' />
<meta content='IE=edge' http-equiv='X-UA-Compatible' />

<link rel="icon" type="image/svg+xml" href="https://feeldreams.github.io/main-icon.png">
<link rel="apple-touch-icon" href="https://feeldreams.github.io/main-icon.png">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/typeit@8.7.0/dist/index.umd.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="{{ asset('template/template1/style.css') }}">

<head>
    <title>Undangan Pernikahan</title>
</head>

<body>

    <div class="overlay">
        <div class="loading-message">Tunggu dulu ya..</div>
        <div id="loveIn" class="blocklove">
            <label class="lovein">&#10084;</label>
            <p id="ket">Sentuh LOVEnya!</p>
        </div>
    </div>

    <audio src="" id="linkmp3" class="sembunyi"></audio>

    <section id="inifirst" class="first">
        <div class="wp"><img src="{{ asset('template/template1/images/bg1.jfif') }}" /></div>
        <!--<img id="first_stiker" class="nonstiker fade-in" src="buku.png"/>-->
        <p class="!text-3xl mt-32 md:mt-20 title agbalumo text-blue-700">{{ isset($data->nama_acara) ? $data->nama_acara
            : 'Pernikahan Agung & Dewi' }}</p>
        <img class="title w-64 h-64 mt-10 p-1 rounded-full ring-2 ring-gray-300"
            src="{{ asset('template/template2/images/bg.jpeg') }}" alt="Bordered avatar">
        @if (isset($data->tanggal_resepsi))
        <h4 class="mt-8 !text-3xl text-blue-700 agbalumo slide-up">{{
            \Carbon\Carbon::parse($data->tanggal_resepsi)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</h4>
        @else
        <h4 class="mt-8 !text-3xl text-blue-700 agbalumo slide-up">31 Februari 2024</h4>
        @endif
    </section>

    <section>
        <div class="wp"><img src="{{ asset('template/template1/images/bg3.jfif') }}" /></div>
        <!--<img class="stiker fade-in" src=""/>-->
        <div class="mt-24 absolute flex items-center justify-center text-center w-full mt-10">
            <h3 class="slide-up itim medium black">We are Getting Married</h3>
        </div>
        <div class="mt-8 absolute flex items-center justify-center w-full h-full text-center z-10">
            <div class="extra itim basis-0 grow px-10 min-w-0 max-w-full my-3 black">
                <div class="slide-left w-full flex items-center justify-center"><img
                        class="w-12 h-12 md:w-44 md:h-44 p-1 rounded-full ring-2 ring-gray-300"
                        src="{{ asset('template/template2/images/cowo.png') }}" alt="Bordered avatar"></div>
                <h3 class="slide-left !text-5xl my-5 itim black">{{ isset($data->nama_pria) ? $data->nama_pria : 'Agung'
                    }}</h3>
                <p class="slide-up nunito black !text-[14px] leading-6 md:!text-lg md:leading-7">{{
                    isset($data->bio_pria) ? $data->bio_pria : 'Biodata Pria' }}</p>
            </div>
            <h1
                class="slide-up text-2xl !md:text-8xl itim basis-0 grow min-w-0 my-3 px-10 flex items-center justify-center flex-[0_0_8%] max-w-[8%] my-3 pink">
                &</h1>
            <div class="basis-0 grow min-w-0 max-w-full px-10 my-3 my-3">
                <div class="slide-right w-full flex items-center justify-center"><img
                        class="w-12 h-12 md:w-44 md:h-44 p-1 rounded-full ring-2 ring-gray-300"
                        src="{{ asset('template/template2/images/cewe.png') }}" alt="Bordered avatar"></div>
                <h3 class="slide-right !text-5xl my-5 itim black">{{ isset($data->nama_wanita) ? $data->nama_wanita :
                    'Dewi' }}</h3>
                <p class="slide-up nunito black !text-[14px] leading-6 md:!text-lg md:leading-7">{{
                    isset($data->bio_wanita) ? $data->bio_wanita : 'Biodata Wanita' }}</p>
            </div>
        </div>
        <div class="blocktext">
            <p id="textsec2" class="anm title"></p>
        </div>
    </section>

    <section>
        <div class="wp"><img src="{{ asset('template/template1/images/bg2.jfif') }}" /></div>
        <img class="stiker w-64 slide-down" src="{{ asset('template/template1/images/kembang.png') }}" />
        <h1 class="title agbalumo blue !text-5xl">Waktu Menuju Acara</h1><br>
        <h2 id="timer" class="!hidden mt-10 title itim pink jedag !text-2xl">31 Februari 2024</h2>
        <div class="z-50 itim jedag title font-bold pink text-3xl text-center justify-center flex flex-col px-0"
            data-waktu="{{ isset($dataAcara->tanggal_akad) ? $dataAcara->tanggal_akad : '2023-12-12 12:00:00' }}"
            id="tampilan-waktu">

            <div class="grid grid-cols-4 gap-4">
                <div class="col">
                    <h2 id="hari">0</h2>
                    <p class="text-sm font-medium">Hari</p>
                </div>
                <div class="col">
                    <h2 id="jam">0</h2>
                    <p class="text-sm font-medium">Jam</p>
                </div>
                <div class="col">
                    <h2 id="menit">0</h2>
                    <p class="text-sm font-medium">Menit</p>
                </div>
                <div class="col">
                    <h2 id="detik">0</h2>
                    <p class="text-sm font-medium">Detik</p>
                </div>
            </div>
        </div>
        <script>
            let countDownDate = (new Date(document.getElementById('tampilan-waktu').getAttribute('data-waktu').replace(' ', 'T'))).getTime();

            setInterval(() => {
                let now = new Date().getTime();
                let distance = Math.abs(countDownDate - now);

                if (now > countDownDate) {
                    document.getElementById('tampilan-waktu').innerHTML = "Acara Telah Selesai";
                    document.getElementById('tampilan-waktu').style.fontSize = "25px";
                } else {
                    document.getElementById('hari').innerText = Math.floor(distance / (1000 * 60 * 60 * 24));
                    document.getElementById('jam').innerText = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    document.getElementById('menit').innerText = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    document.getElementById('detik').innerText = Math.floor((distance % (1000 * 60)) / 1000);
                }
            }, 1000);
        </script>
        <h2 class="mt-10 slide-up itim !text-base black">Akad: {{ isset($data->tanggal_akad) ? $data->tanggal_akad : '2023-12-12' }} - {{ isset($data->tempat_akad) ? $data->tempat_akad : 'Hotel Satu Nusantara' }}</h2>
        <h2 class="mt-2 slide-up itim !text-base black">Resepsi: {{ isset($data->tanggal_resepsi) ? $data->tanggal_resepsi : '2023-12-13' }} - {{ isset($data->tempat_resepsi) ? $data->tempat_resepsi : 'Hotel Dua Jakarta' }}</h2>
    </section>

    <section>
        <div class="wp"><img src="{{ asset('template/template1/images/bg4.jfif') }}" /></div>
        <!--<img class="stiker fade-in" src=""/>-->
        <h1 class="mt-48 md:mt-32 title agbalumo blue">Save The Date</h1><br>
        @if (isset($data->tanggal_resepsi))
        <h2 class="title itim pink jedag">{{
            \Carbon\Carbon::parse($data->tanggal_resepsi)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</h4>
        @else
        <h2 class="title itim pink jedag">31 Februari 2024</h2>
        @endif
        <h2 class="mt-10 title itim black !text-xl">Jangan lupa hadir dan<br>mohon do'a restunya yaa :)</h2><br><br>
        <img class="absolute flex items-center justify-center stiker fade-in w-28 md:w-44 left-0"
            src="{{ asset('template/template1/images/kembang2.png') }}" />
        <img class="absolute flex items-center justify-center stiker fade-in w-28 md:w-44 right-0 -scale-x-100"
            src="{{ asset('template/template1/images/kembang2.png') }}" />

        {{--<script>
            @if(isset($event) && $event->event_datetime)
        var countDownDate = new Date("{{ $event->event_datetime->toIso8601String() }}").getTime();
    @else
        var countDownDate = new Date("2028-01-10T07:30:00").getTime();
    @endif

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        if (distance > 0) {
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("timer").innerHTML = days + " hari " + hours + " jam " +
                minutes + " menit " + seconds + " detik ";
        } else {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "Acara telah selesai";
        }
    }, 1000);
        </script>--}}

    </section>

    <div id="initom" class="menu">
        <a class='tombol' onclick="tes()">
            <svg class='fill-none stroke-white stroke-2' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'>
                <g transform='translate(5.000000, 8.500000)'>
                    <path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path>
                </g>
            </svg> </a>
    </div>

    <script src="{{ asset('template/template1/script.js') }}"></script>

</body>

</html>