@extends('layouts.app')
@section('content')
    <style>
        .rowlist{
            margin-top: 10px;
        }
        ul{
            list-style: none;
            color:white;
        }
        .right {
            text-align: right
        }
        .heading{
            color: white;
        }
        .discount {
            color:#DA224D;
            margin-top:-10px
        }
        .additional {
            margin-top: 20px;
        }
        .logout{
            margin-top: 50px;
        }
        span{
            color: gray;
            font-size: 12px;
        }
        .subscription:hover{
            color: inherit;
        }
    </style>
    <div id="franchise">
        <div id="content">
            <div class="row">
                @include('profile.layouts.left-side-menu')
                <div class="col-md-8">
                    <div>
                        <div class="tab" style="margin-top: 30px">
                            <h1>Подписки</h1>
                            <button class="tablinks active" onclick="openSubWines(event, 'current')">Действующие</button>
                            <button class="tablinks" onclick="openSubWines(event, 'old')">Прошедшие</button>
                        </div>

                        <div id="current" class="tabcontent" style="display: block">
                            @if(empty($subscriptions))
                                <div style="color: grey !important; margin: 100px;">
                                    <center>
                                        <h3>У вас нет действующих подписок</h3>
                                        <button class="btn-danger"><a class="subscription" href="{{route('subscription')}}">Оформить подписку</a></button>
                                    </center>
                                </div>
                            @else
                            @foreach($subscriptions as $sub)
                            <hr>
                            <h2>{{$sub->title}}</h2>
                            <div>
                                <span>3 месяца</span><span> | </span><span>до 10.12.2020</span>
                            </div>
                            <div style="margin-top: 20px; margin-bottom: -35px;">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="2.787cm" height="4.516cm">
                                    <path fill-rule="evenodd"  fill="rgb(75, 75, 92)"
                                          d="M73.723,127.999 L6.185,127.999 C3.298,127.999 0.950,125.648 0.950,122.758 L0.958,74.647 L5.174,41.430 L5.174,5.236 C5.174,2.347 7.521,-0.005 10.407,-0.005 L69.499,-0.005 C72.385,-0.005 74.733,2.347 74.733,5.236 L74.733,41.430 L78.956,74.773 L78.956,122.758 C78.956,125.648 76.608,127.999 73.723,127.999 ZM76.962,74.836 L72.738,41.493 L72.738,5.236 C72.738,3.447 71.286,1.992 69.499,1.992 L10.407,1.992 C8.621,1.992 7.168,3.447 7.168,5.236 L7.160,41.619 L2.945,74.836 L2.945,122.758 C2.945,124.547 4.398,126.002 6.185,126.002 L73.723,126.002 C75.509,126.002 76.962,124.547 76.962,122.758 L76.962,74.836 ZM68.690,82.332 L56.671,82.332 L46.646,82.332 L41.642,82.332 L41.642,80.335 L44.652,80.335 L44.652,70.339 C44.652,63.073 51.991,58.869 52.304,58.693 C52.469,58.601 52.664,58.268 52.664,58.078 L52.664,37.864 C52.664,37.607 52.602,37.372 52.558,37.270 C52.046,36.794 51.862,35.902 51.862,35.254 L51.862,33.886 C51.862,33.230 52.051,32.324 52.576,31.853 C52.614,31.775 52.664,31.601 52.664,31.434 C52.664,30.420 53.559,29.594 54.658,29.594 L61.478,29.594 C62.578,29.594 63.472,30.440 63.472,31.480 C63.472,31.699 63.540,31.924 63.585,32.014 C64.127,32.540 64.274,33.540 64.274,34.063 L64.274,35.412 C64.274,35.944 64.123,36.985 63.557,37.515 C63.567,37.530 63.472,37.844 63.472,38.161 L63.472,58.078 C63.472,58.281 63.677,58.649 63.849,58.757 C64.128,58.931 70.684,63.104 70.684,70.339 L70.684,76.952 L70.684,80.335 L72.892,80.335 L72.892,82.332 L70.684,82.332 L68.690,82.332 ZM68.690,70.339 C68.690,64.199 62.854,60.489 62.795,60.452 C62.031,59.976 61.478,58.977 61.478,58.078 L61.478,38.356 L57.668,38.356 L57.668,36.360 L61.973,36.360 C62.042,36.255 62.104,36.143 62.193,36.059 C62.185,36.042 62.280,35.729 62.280,35.412 L62.280,34.063 C62.280,33.787 62.207,33.515 62.156,33.409 C61.717,32.973 61.505,32.219 61.480,31.601 L54.658,31.591 L54.656,31.591 L54.653,31.591 C54.644,31.766 54.613,31.948 54.570,32.131 L57.668,32.131 L57.668,34.128 L53.857,34.128 L53.857,35.254 C53.857,35.511 53.920,35.746 53.963,35.848 C54.474,36.323 54.658,37.215 54.658,37.864 L54.658,58.078 C54.658,58.996 54.078,59.987 53.279,60.435 C53.214,60.472 46.646,64.253 46.646,70.339 L46.646,80.335 L56.671,80.335 L56.671,76.952 L68.690,76.952 L68.690,70.339 ZM68.690,78.949 L58.665,78.949 L58.665,80.335 L68.690,80.335 L68.690,78.949 ZM51.692,23.188 L28.215,23.188 C24.608,23.188 21.674,20.250 21.674,16.639 C21.674,13.028 24.608,10.090 28.215,10.090 L51.692,10.090 C55.298,10.090 58.232,13.028 58.232,16.639 C58.232,20.250 55.298,23.188 51.692,23.188 ZM51.692,12.087 L28.215,12.087 C25.709,12.087 23.669,14.130 23.669,16.639 C23.669,19.149 25.709,21.191 28.215,21.191 L51.692,21.191 C54.198,21.191 56.238,19.149 56.238,16.639 C56.238,14.130 54.198,12.087 51.692,12.087 ZM28.845,31.480 C28.845,31.699 28.912,31.924 28.958,32.014 C29.499,32.540 29.646,33.540 29.646,34.063 L29.646,35.412 C29.646,35.944 29.495,36.985 28.930,37.515 C28.939,37.530 28.845,37.844 28.845,38.161 L28.845,58.078 C28.845,58.281 29.049,58.649 29.221,58.757 C29.500,58.931 36.057,63.104 36.057,70.339 L36.057,76.952 L36.057,80.335 L38.264,80.335 L38.264,82.332 L36.057,82.332 L34.063,82.332 L22.043,82.332 L12.018,82.332 L7.015,82.332 L7.015,80.335 L10.024,80.335 L10.024,70.339 C10.024,63.073 17.364,58.869 17.676,58.693 C17.842,58.601 18.037,58.268 18.037,58.078 L18.037,37.864 C18.037,37.607 17.974,37.372 17.930,37.270 C17.420,36.794 17.235,35.902 17.235,35.254 L17.235,33.886 C17.235,33.230 17.424,32.323 17.950,31.853 C17.987,31.774 18.037,31.601 18.037,31.434 C18.037,30.420 18.931,29.594 20.031,29.594 L26.851,29.594 C27.950,29.594 28.845,30.440 28.845,31.480 ZM24.038,80.335 L34.063,80.335 L34.063,78.949 L24.038,78.949 L24.038,80.335 ZM20.027,31.591 C20.017,31.766 19.986,31.949 19.943,32.131 L23.040,32.131 L23.040,34.128 L19.229,34.128 L19.229,35.254 C19.229,35.511 19.292,35.746 19.336,35.848 C19.847,36.322 20.031,37.215 20.031,37.864 L20.031,58.078 C20.031,58.996 19.451,59.987 18.652,60.435 C18.587,60.472 12.018,64.253 12.018,70.339 L12.018,80.335 L22.043,80.335 L22.043,76.952 L34.063,76.952 L34.063,70.339 C34.063,64.199 28.225,60.489 28.167,60.452 C27.404,59.976 26.851,58.977 26.851,58.078 L26.851,38.356 L23.040,38.356 L23.040,36.360 L27.345,36.360 C27.414,36.255 27.476,36.143 27.565,36.059 C27.558,36.042 27.652,35.729 27.652,35.412 L27.652,34.063 C27.652,33.787 27.579,33.515 27.529,33.409 C27.089,32.973 26.878,32.219 26.852,31.601 L20.031,31.591 L20.027,31.591 ZM38.252,107.763 C38.066,107.948 37.815,108.053 37.552,108.053 C37.289,108.053 37.038,107.948 36.852,107.763 L33.880,104.793 C33.493,104.406 33.493,103.780 33.880,103.393 C34.267,103.007 34.893,103.007 35.280,103.393 L37.552,105.662 L46.757,96.455 C47.144,96.067 47.771,96.068 48.158,96.454 C48.545,96.841 48.545,97.467 48.158,97.854 L38.252,107.763 ZM29.269,97.993 C30.786,96.220 32.874,94.960 35.151,94.446 C37.428,93.934 39.855,94.173 41.988,95.122 C42.486,95.344 42.712,95.929 42.488,96.428 C42.267,96.928 41.683,97.152 41.180,96.930 C39.438,96.154 37.451,95.957 35.587,96.378 C33.725,96.798 32.016,97.829 30.775,99.280 C29.534,100.730 28.782,102.577 28.657,104.482 C28.530,106.385 29.034,108.316 30.073,109.918 C31.112,111.517 32.672,112.763 34.463,113.426 C36.254,114.085 38.247,114.154 40.079,113.611 C41.910,113.071 43.549,111.930 44.693,110.402 C45.836,108.873 46.466,106.982 46.467,105.073 L46.467,104.163 C46.467,103.616 46.910,103.173 47.458,103.173 C48.005,103.173 48.449,103.616 48.449,104.163 L48.449,105.073 C48.447,107.406 47.677,109.719 46.279,111.587 C44.881,113.456 42.878,114.849 40.641,115.510 C39.639,115.806 38.598,115.954 37.556,115.954 C36.271,115.954 34.986,115.728 33.776,115.283 C31.586,114.474 29.681,112.950 28.411,110.995 C27.141,109.038 26.526,106.678 26.679,104.352 C26.833,102.023 27.753,99.766 29.269,97.993 Z"/>
                                </svg>
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="2.787cm" height="4.516cm">
                                    <path fill-rule="evenodd"  fill="rgb(208, 208, 208)"
                                          d="M73.722,127.999 L6.185,127.999 C3.298,127.999 0.950,125.648 0.950,122.758 L0.958,74.647 L5.173,41.430 L5.173,5.237 C5.173,2.347 7.522,-0.005 10.408,-0.005 L69.499,-0.005 C72.385,-0.005 74.733,2.347 74.733,5.237 L74.733,41.430 L78.956,74.773 L78.956,122.758 C78.956,125.648 76.608,127.999 73.722,127.999 ZM76.962,74.836 L72.739,41.493 L72.739,5.237 C72.739,3.448 71.286,1.992 69.499,1.992 L10.408,1.992 C8.621,1.992 7.168,3.448 7.168,5.237 L7.160,41.619 L2.944,74.836 L2.944,122.758 C2.944,124.547 4.398,126.002 6.185,126.002 L73.722,126.002 C75.509,126.002 76.962,124.547 76.962,122.758 L76.962,74.836 ZM68.690,82.332 L56.671,82.332 L46.646,82.332 L41.642,82.332 L41.642,80.335 L44.651,80.335 L44.651,70.339 C44.651,63.073 51.991,58.869 52.303,58.693 C52.469,58.601 52.664,58.268 52.664,58.078 L52.664,37.864 C52.664,37.607 52.601,37.372 52.557,37.270 C52.047,36.794 51.862,35.902 51.862,35.254 L51.862,33.886 C51.862,33.230 52.051,32.325 52.577,31.853 C52.613,31.775 52.664,31.601 52.664,31.434 C52.664,30.420 53.558,29.594 54.658,29.594 L61.478,29.594 C62.577,29.594 63.473,30.440 63.473,31.480 C63.473,31.699 63.539,31.924 63.585,32.014 C64.126,32.541 64.274,33.540 64.274,34.063 L64.274,35.412 C64.274,35.944 64.123,36.985 63.557,37.515 C63.567,37.530 63.473,37.844 63.473,38.161 L63.473,58.078 C63.473,58.281 63.677,58.649 63.849,58.757 C64.128,58.931 70.684,63.104 70.684,70.339 L70.684,76.952 L70.684,80.335 L72.892,80.335 L72.892,82.332 L70.684,82.332 L68.690,82.332 ZM68.690,80.335 L68.690,78.949 L58.665,78.949 L58.665,80.335 L68.690,80.335 ZM68.690,70.339 C68.690,64.200 62.853,60.489 62.795,60.451 C62.032,59.976 61.478,58.977 61.478,58.078 L61.478,38.356 L57.668,38.356 L57.668,36.360 L61.973,36.360 C62.042,36.255 62.104,36.143 62.193,36.059 C62.185,36.042 62.279,35.729 62.279,35.412 L62.279,34.063 C62.279,33.787 62.206,33.515 62.156,33.409 C61.717,32.973 61.506,32.219 61.480,31.601 L54.658,31.591 L54.656,31.591 L54.653,31.591 C54.644,31.766 54.613,31.948 54.571,32.131 L57.668,32.131 L57.668,34.128 L53.856,34.128 L53.856,35.254 C53.856,35.511 53.920,35.746 53.963,35.848 C54.474,36.323 54.658,37.215 54.658,37.864 L54.658,58.078 C54.658,58.996 54.078,59.987 53.278,60.435 C53.214,60.472 46.646,64.253 46.646,70.339 L46.646,80.335 L56.671,80.335 L56.671,76.952 L68.690,76.952 L68.690,70.339 ZM51.692,23.188 L28.215,23.188 C24.609,23.188 21.675,20.250 21.675,16.639 C21.675,13.028 24.609,10.090 28.215,10.090 L51.692,10.090 C55.298,10.090 58.232,13.028 58.232,16.639 C58.232,20.250 55.298,23.188 51.692,23.188 ZM51.692,12.087 L28.215,12.087 C25.709,12.087 23.669,14.130 23.669,16.639 C23.669,19.149 25.709,21.191 28.215,21.191 L51.692,21.191 C54.199,21.191 56.237,19.149 56.237,16.639 C56.237,14.130 54.199,12.087 51.692,12.087 ZM28.845,31.480 C28.845,31.699 28.912,31.924 28.958,32.014 C29.499,32.541 29.647,33.540 29.647,34.063 L29.647,35.412 C29.647,35.944 29.496,36.985 28.929,37.515 C28.940,37.530 28.845,37.844 28.845,38.161 L28.845,58.078 C28.845,58.281 29.049,58.649 29.222,58.757 C29.500,58.931 36.057,63.104 36.057,70.339 L36.057,76.952 L36.057,80.335 L38.264,80.335 L38.264,82.332 L36.057,82.332 L34.062,82.332 L22.043,82.332 L12.019,82.332 L7.015,82.332 L7.015,80.335 L10.024,80.335 L10.024,70.339 C10.024,63.073 17.364,58.869 17.676,58.693 C17.842,58.601 18.036,58.268 18.036,58.078 L18.036,37.864 C18.036,37.607 17.974,37.372 17.931,37.270 C17.419,36.794 17.236,35.902 17.236,35.254 L17.236,33.886 C17.236,33.230 17.424,32.323 17.950,31.853 C17.986,31.774 18.036,31.601 18.036,31.434 C18.036,30.420 18.931,29.594 20.031,29.594 L26.850,29.594 C27.950,29.594 28.845,30.440 28.845,31.480 ZM24.037,80.335 L34.062,80.335 L34.062,78.949 L24.037,78.949 L24.037,80.335 ZM20.026,31.591 C20.017,31.766 19.986,31.948 19.943,32.131 L23.040,32.131 L23.040,34.128 L19.230,34.128 L19.230,35.254 C19.230,35.511 19.292,35.746 19.336,35.848 C19.847,36.322 20.031,37.215 20.031,37.864 L20.031,58.078 C20.031,58.996 19.450,59.987 18.652,60.435 C18.587,60.472 12.019,64.253 12.019,70.339 L12.019,80.335 L22.043,80.335 L22.043,76.952 L34.062,76.952 L34.062,70.339 C34.062,64.200 28.225,60.489 28.167,60.451 C27.404,59.976 26.850,58.977 26.850,58.078 L26.850,38.356 L23.040,38.356 L23.040,36.360 L27.345,36.360 C27.415,36.255 27.477,36.143 27.565,36.059 C27.557,36.042 27.652,35.729 27.652,35.412 L27.652,34.063 C27.652,33.787 27.579,33.515 27.528,33.409 C27.089,32.973 26.878,32.219 26.853,31.601 L20.031,31.591 L20.026,31.591 Z"/>
                                </svg>
                            </div>
                            @endforeach
                            @endif
                        </div>

                        <div id="old" class="tabcontent">
                            <div style="color: grey !important; margin: 100px;">
                                <center>
                                    <h3>Здесь ничего нет</h3>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function openSubWines(evt, subTime) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(subTime).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection