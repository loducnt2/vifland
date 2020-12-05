<!DOCTYPE html>
<html class="overflow-hidden" lang="en">
    {{-- @extends('layouts.app') --}}
    @extends('layouts.master')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<head>
		<title>Tin tức</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="../css/core.min.css">
		<link rel="stylesheet" href="../css/main.min.css">
		<link rel="shortcut icon" type="image/png" href="/favicon.ico">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	</head>
	<body>
		<form action="">
			<section class="logo_animation">
				<div class="logo-wrapper"><img src="{{asset('assets/logo/height-650.png')}}" alt="">
					<svg id="logo_animation" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="1 1 1023.35 650" width="100%" height="100%">
						<defs>
							<style>.cls-1{isolation:isolate;}.cls-2{opacity:0.3;mix-blend-mode:multiply;}.cls-10,.cls-11,.cls-12,.cls-13,.cls-14,.cls-15,.cls-16,.cls-17,.cls-18,.cls-19,.cls-20,.cls-21,.cls-22,.cls-23,.cls-24,.cls-25,.cls-26,.cls-3,.cls-4,.cls-5,.cls-6,.cls-7,.cls-8,.cls-9{fill:none;}.cls-10,.cls-11,.cls-12,.cls-13,.cls-14,.cls-15,.cls-16,.cls-17,.cls-19,.cls-20,.cls-21,.cls-22,.cls-23,.cls-24,.cls-25,.cls-26,.cls-3,.cls-4,.cls-5,.cls-6,.cls-7,.cls-8,.cls-9{stroke-miterlimit:10;stroke-width:2px;}.cls-3{stroke:url(#linear-gradient);}.cls-4{stroke:url(#linear-gradient-2);}.cls-5{stroke:url(#linear-gradient-3);}.cls-6{stroke:url(#linear-gradient-4);}.cls-7{stroke:url(#linear-gradient-5);}.cls-8{stroke:url(#linear-gradient-6);}.cls-9{stroke:url(#linear-gradient-7);}.cls-10{stroke:url(#linear-gradient-8);}.cls-11{stroke:url(#linear-gradient-9);}.cls-12{stroke:url(#linear-gradient-10);}.cls-13{stroke:url(#linear-gradient-11);}.cls-14{stroke:url(#linear-gradient-12);}.cls-15{stroke:url(#linear-gradient-13);}.cls-16{stroke:url(#linear-gradient-14);}.cls-17{stroke:url(#linear-gradient-15);}.cls-19{stroke:url(#linear-gradient-16);}.cls-20{stroke:url(#linear-gradient-17);}.cls-21{stroke:url(#linear-gradient-18);}.cls-22{stroke:url(#linear-gradient-19);}.cls-23{stroke:url(#linear-gradient-20);}.cls-24{stroke:url(#linear-gradient-21);}.cls-25{stroke:url(#linear-gradient-22);}.cls-26{stroke:url(#linear-gradient-23);}</style>
							<lineargradient id="linear-gradient" x1="490.05" y1="86.94" x2="491.39" y2="86.94" gradientUnits="userSpaceOnUse">
								<stop offset="0" stop-color="#af8365"></stop>
								<stop offset="1" stop-color="#e9c587"></stop>
							</lineargradient>
							<lineargradient id="linear-gradient-2" x1="300.8" y1="314.67" x2="724.59" y2="314.67" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-3" x1="299.47" y1="297.45" x2="723.26" y2="297.45" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-4" x1="489.98" y1="92.51" x2="491.3" y2="92.51" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-5" x1="527.47" y1="122.27" x2="529.74" y2="122.27" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-6" x1="362.64" y1="308.15" x2="430.86" y2="308.15" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-7" x1="490.54" y1="157.62" x2="492.55" y2="157.62" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-8" x1="427.38" y1="108.91" x2="491.69" y2="108.91" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-9" x1="489.37" y1="191.29" x2="669.12" y2="191.29" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-10" x1="878.39" y1="454.97" x2="878.39" y2="454.97" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-11" x1="938.12" y1="410.9" x2="1116.9" y2="410.9" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-12" x1="362.21" y1="256.44" x2="595.28" y2="256.44" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-13" x1="428.95" y1="282.48" x2="491.29" y2="282.48" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-14" x1="976.36" y1="549.53" x2="1028.63" y2="549.53" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-15" x1="427.47" y1="249.14" x2="430.93" y2="249.14" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-16" x1="853.79" y1="781.26" x2="948.51" y2="781.26" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-17" x1="946.79" y1="778.17" x2="1142.43" y2="778.17" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-18" x1="1149.1" y1="781.14" x2="1287.1" y2="781.14" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-19" x1="1314.65" y1="781.26" x2="1471.88" y2="781.26" xlink:href="#linear-gradient"></lineargradient>
							<lineargradient id="linear-gradient-20" x1="448.53" y1="774.71" x2="639.85" y2="774.71" gradientUnits="userSpaceOnUse">
								<stop offset="0" stop-color="#031e3c"></stop>
								<stop offset="1" stop-color="#3379aa"></stop>
							</lineargradient>
							<lineargradient id="linear-gradient-21" x1="648.32" y1="782.95" x2="681.04" y2="782.95" xlink:href="#linear-gradient-20"></lineargradient>
							<lineargradient id="linear-gradient-22" x1="712.56" y1="782.95" x2="835.15" y2="782.95" xlink:href="#linear-gradient-20"></lineargradient>
							<lineargradient id="linear-gradient-23" x1="533.06" y1="604.63" x2="553.5" y2="709.52" gradientUnits="userSpaceOnUse">
								<stop offset="0" stop-color="#fece00"></stop>
								<stop offset="1" stop-color="#fc6e00"></stop>
							</lineargradient>
						</defs>
						<g class="cls-1">
							<g id="Layer_1" data-name="Layer 1">
								<image class="cls-2" width="42" height="42" transform="translate(480.87 80.03) scale(0.48)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACoAAAAqCAYAAADFw8lbAAAACXBIWXMAABcRAAAXEQHKJvM/AAABVUlEQVRYR+2Y6wrCMAxGv4jv/8r1V7CLubfeoAdk0obt7MvaiTTGwD9wiwp+hSO6myO6m78RvUcFGYiIrLmxaf+jlfN4gpJV4ZZoRVDSFS6JOoKeuHqBqnB6MRmSBF/SrKl2pbuY5otEF+TkuK6UJJNqvbj7zHdmPrn6PfsIpFuvQNPRk5/r2oSJGmlaR40RHFOpdhL1JGn6WPUtXFHn2ZRjUk6OueKZHaCTKGCnoyUq51t0RWes1m5pObMiWhWo1l9YEQ1XqqBaf2FFlHnZboLxFt1X6IDeykgqmjdxExUbsZbQPKYl6qX69g2fscSltPlGqhC+QgFz4/e2peh5LaUJ7EtUS1DOpYQsUokC4es02iPVG8mmCayteuApmLlgpsYk3Xrj7mXbNdSaSppAofUzmV87FlVBpiXKVIS7gsySKPPz/5R8kvRi+jZHdDdHdDdHdDcPkkaYL2NuCOkAAAAASUVORK5CYII="></image>
								<path class="cls-3 EUwIDAll_0" d="M490.59,86.94L490.61,86.93L490.72,86.83"></path>
								<path class="cls-4 EUwIDAll_1" d="M566.14,168.26L710.02,282.84L723,293.17L515.63,462.04L302.31,287.25L311.7,278.31L428.38,167.06L428.72,166.73"></path>
								<path class="cls-5 EUwIDAll_2" d="M566.14,151.55L721.67,273.19L710.02,282.84L660.18,324.14L658.25,325.75L583.39,387.76L529.06,432.77L516.58,443.12L516.32,443.34L514.3,445.01L465.15,404.57L434.8,379.6L434.26,379.14L429.93,375.6L311.7,278.31L300.99,269.5L428.38,150.55L428.62,150.33L428.81,150.15L429.71,149.32"></path>
								<path class="cls-6 EUwIDAll_3" d="M490.69,92.54L490.59,92.47"></path>
								<path class="cls-7 EUwIDAll_4" d="M528.18,121.86L528.19,121.87L528.65,122.23L528.96,122.47L529.12,122.6"></path>
								<path class="cls-8 EUwIDAll_5" d="M429.14,239.61L428.38,240.14L401.26,259.08L363.64,285.36L363.64,320.32L429.87,375.39L429.87,364.76"></path>
								<path class="cls-9 EUwIDAll_6" d="M491.55,157.63L491.55,157.62L491.55,157.61L491.54,157.5"></path>
								<path class="cls-10 EUwIDAll_7" d="M428.81,150.15L428.52,130.87L428.51,130.27L428.39,122.6L430.82,120L430.89,119.94L431.19,119.61L435.68,115.83L436.3,115.3L490.38,69.77L490.59,85.66L490.61,86.93L490.69,92.54L490.69,93.27"></path>
								<path class="cls-11 EUwIDAll_8" d="M491.11,3.87L490.38,158.63L529.11,120.97L529.71,246.03L593.81,285.36L594.28,378.71L668.1,317.41L666.81,286.88L566.14,218.37L566.14,65.91L491.11,3.87Z"></path>
								<path class="cls-12 EUwIDAll_9" d="M878.39,455" transform="translate(-448.53 -212.89)"></path>
								<path class="cls-13 EUwIDAll_10" d="M962.23,235.44l-23.11-20.33V371.42l1-.91h0l37.1-35.37.3-.3v.54L977.55,452v4.36l.08.16v0l.6,1.3h0l.69,1.5,0,.09,6.41,3.87.11.06,57.32,34.56v93.31l-10.9,9.41-8.65,7.48,83.51-69.49,1.94-1.61,7.19-6v-.14l-.56-31.13-100.68-69" transform="translate(-448.53 -212.89)"></path>
								<path class="cls-14 EUwIDAll_11" d="M594.28,285.03L594.28,378.35L574.73,395.24L529.11,432.8L514.29,445.01L465.15,404.54L430.72,376.19L429.6,375.24L363.2,320.58L363.2,285.03L428.38,240.59L428.38,148.15L428.38,122.09L490.6,68.76L490.6,158.53L528.96,121.94L529.11,246.51L530.44,246.54L594.28,285.03Z"></path>
								<path class="cls-15 EUwIDAll_12" d="M490.6,158.53L465.15,182.82L465.15,404.54L465.15,405.01L429.6,375.24"></path>
								<path class="cls-16 EUwIDAll_13" d="M1028,604.57l-50.37,41.48c-.55.51-.08-194-.08-194" transform="translate(-448.53 -212.89)"></path>
								<path class="cls-17 EUwIDAll_14" d="M428.47,122.6L429.93,375.68"></path>
								<path class="cls-18 EUwIDAll_15" d="M960.52,825" transform="translate(-448.53 -212.89)"></path>
								<path class="cls-19 EUwIDAll_16" d="M858.88,849.42V712.78a5.28,5.28,0,0,0-.33-2,5,5,0,0,0-1.18-1.66l-2.58-2.69v-1.5h30.73v1.5l-2.58,2.69a4.5,4.5,0,0,0-1.24,1.66,5.18,5.18,0,0,0-.37,2V836.64h55.75a6.09,6.09,0,0,0,2.2-.38,8.52,8.52,0,0,0,2.42-1.55l4.08-3.55,1.4.86-13.86,25.57H854.79v-1.51l2.58-2.68a5,5,0,0,0,1.13-1.72A6.26,6.26,0,0,0,858.88,849.42Z" transform="translate(-448.53 -212.89)"></path>
								<path class="cls-20 EUwIDAll_17" d="M981.13,857.59H948.58l96.36-157.92,95.71,157.92h-33v-1.51a5.83,5.83,0,0,0,3.39-.86,2.62,2.62,0,0,0,1.23-2.25,5.48,5.48,0,0,0-.27-1.77,4.35,4.35,0,0,0-.59-1.24L1079,796.68h-46.84a36.67,36.67,0,0,0-4.4.16,2.31,2.31,0,0,0-1.51.7l-3.11,2.58-1.08-.86,13.65-23.53h30.4l-21.16-34.91-67.57,109a4.77,4.77,0,0,0-.65,1.45,6.65,6.65,0,0,0-.21,1.67,2.62,2.62,0,0,0,1.23,2.25,5.79,5.79,0,0,0,3.39.86Z" transform="translate(-448.53 -212.89)"></path>
								<path class="cls-21 EUwIDAll_18" d="M1261.72,811V712.78a7.28,7.28,0,0,0-.43-2,5.18,5.18,0,0,0-1.18-1.66l-2.8-2.69v-1.5h28.79v1.5l-2.68,2.69a5.05,5.05,0,0,0-1.13,1.66,5.19,5.19,0,0,0-.38,2V862.64l-107.1-109.36v96.14a6.26,6.26,0,0,0,.38,2.26,4.85,4.85,0,0,0,1.13,1.72l2.57,2.68v1.51H1150.1v-1.51l2.91-2.68a5,5,0,0,0,1.12-1.72,6.26,6.26,0,0,0,.38-2.26V699.67Z" transform="translate(-448.53 -212.89)"></path>
								<path class="cls-22 EUwIDAll_19" d="M1315.65,857.59v-1.51l2.79-2.68a5,5,0,0,0,1.13-1.72,6.26,6.26,0,0,0,.37-2.26V712.78a5.29,5.29,0,0,0-.32-2,5,5,0,0,0-1.18-1.66l-2.79-2.69v-1.5h73.9q18.06,0,30.89,3.7a62,62,0,0,1,22.5,11.66,73.76,73.76,0,0,1,20.79,27.5,87.53,87.53,0,0,1,7.15,35.66,79.18,79.18,0,0,1-6.61,32.77,68.49,68.49,0,0,1-19.5,25.24A67.62,67.62,0,0,1,1422,853.88q-12,3.71-33.2,3.71Zm73.9-132h-47.37V836.64h46.62q14.94,0,23.37-2.31a43.26,43.26,0,0,0,15.41-7.79,48.46,48.46,0,0,0,15-19.12q5-11.38,5-26.21a64.06,64.06,0,0,0-5-25.3,53.35,53.35,0,0,0-14.13-19.71,38.8,38.8,0,0,0-15.63-8.06Q1403.41,725.56,1389.55,725.56Z" transform="translate(-448.53 -212.89)"></path>
								<path class="cls-23 EUwIDAll_20" d="M544.37,811.06l58.38-112.79a41,41,0,0,0,2-4.71,10.45,10.45,0,0,0,.68-3.1,4.05,4.05,0,0,0-.31-1.61,4.38,4.38,0,0,0-.93-1.37l-2.48-2.6v-1.74H638.2l-94.08,182-93.95-182h38.05v1.74L486,687.11a6.34,6.34,0,0,0-1.18,1.61,3.46,3.46,0,0,0-.43,1.49,12,12,0,0,0,.74,3.35,33.54,33.54,0,0,0,2.11,4.83Z" transform="translate(-448.53 -212.89)"></path>
								<path class="cls-24 EUwIDAll_21" d="M653.51,851.12V714.47a5.22,5.22,0,0,0-.38-2,4.55,4.55,0,0,0-1.23-1.66l-2.58-2.69v-1.5H680v1.5l-2.58,2.69a5.29,5.29,0,0,0-1.18,1.66,5.49,5.49,0,0,0-.32,2V851.12a6.17,6.17,0,0,0,.37,2.25,4.9,4.9,0,0,0,1.13,1.72l2.58,2.69v1.5H649.32v-1.5l2.58-2.69a4.35,4.35,0,0,0,1.23-1.72A6.16,6.16,0,0,0,653.51,851.12Z" transform="translate(-448.53 -212.89)"></path>
								<path class="cls-25 EUwIDAll_22" d="M717.64,851.12V714.47a5.49,5.49,0,0,0-.32-2,5.29,5.29,0,0,0-1.18-1.66l-2.58-2.69v-1.5H833.44l-14.28,25.46H818v-1.5a3.3,3.3,0,0,0-.86-2.53,3.62,3.62,0,0,0-2.57-.8H740.09V785.8l11.28-20.73h51.89L789,791.5h-1.08v-2.58a2.57,2.57,0,0,0-1-2.15,4.12,4.12,0,0,0-2.58-.75H740.09v65.1a6,6,0,0,0,.38,2.25,4.35,4.35,0,0,0,1.23,1.72l2.58,2.69v1.5H713.56v-1.5l2.58-2.69a4.87,4.87,0,0,0,1.12-1.72A6.16,6.16,0,0,0,717.64,851.12Z" transform="translate(-448.53 -212.89)"></path>
								<path class="cls-26 EUwIDAll_23" d="M539.34,710.81h0A28.52,28.52,0,0,0,543.2,702c2.74-11.1-2.17-21-5.18-25.7a56.9,56.9,0,0,1-5.29-10.37l0-.09a63.92,63.92,0,0,1-2-6.33q-.45-2-.78-4.17a52.44,52.44,0,0,1-.46-9.74,50.55,50.55,0,0,0,3.4,38.94h0a46.86,46.86,0,0,1-9.73-15.61c-.22-.57-.42-1.13-.61-1.69a42.22,42.22,0,0,1,.28-26.75,88.21,88.21,0,0,1,23.35-36.3h0a85.18,85.18,0,0,0,16.38,50.37,35.36,35.36,0,0,1,6,13.76c0,.07,0,.14.05.21a32.13,32.13,0,0,1-6.22,25.37,49.2,49.2,0,0,1-4.33,5A50.26,50.26,0,0,1,539.34,710.81Z" transform="translate(-448.53 -212.89)"></path>
							</g>
						</g>
						<style data-made-with="vivus-instant">.EUwIDAll_0{stroke-dasharray:1 3;stroke-dashoffset:2;animation:EUwIDAll_draw 2000ms ease-in-out 0ms forwards;}.EUwIDAll_1{stroke-dasharray:919 921;stroke-dashoffset:920;animation:EUwIDAll_draw 2000ms ease-in-out 43ms forwards;}.EUwIDAll_2{stroke-dasharray:920 922;stroke-dashoffset:921;animation:EUwIDAll_draw 2000ms ease-in-out 86ms forwards;}.EUwIDAll_3{stroke-dasharray:1 3;stroke-dashoffset:2;animation:EUwIDAll_draw 2000ms ease-in-out 130ms forwards;}.EUwIDAll_4{stroke-dasharray:2 4;stroke-dashoffset:3;animation:EUwIDAll_draw 2000ms ease-in-out 173ms forwards;}.EUwIDAll_5{stroke-dasharray:212 214;stroke-dashoffset:213;animation:EUwIDAll_draw 2000ms ease-in-out 217ms forwards;}.EUwIDAll_6{stroke-dasharray:1 3;stroke-dashoffset:2;animation:EUwIDAll_draw 2000ms ease-in-out 260ms forwards;}.EUwIDAll_7{stroke-dasharray:133 135;stroke-dashoffset:134;animation:EUwIDAll_draw 2000ms ease-in-out 304ms forwards;}.EUwIDAll_8{stroke-dasharray:1001 1003;stroke-dashoffset:1002;animation:EUwIDAll_draw 2000ms ease-in-out 347ms forwards;}.EUwIDAll_9{stroke-dasharray:0 2;stroke-dashoffset:1;animation:EUwIDAll_draw 2000ms ease-in-out 391ms forwards;}.EUwIDAll_10{stroke-dasharray:833 835;stroke-dashoffset:834;animation:EUwIDAll_draw 2000ms ease-in-out 434ms forwards;}.EUwIDAll_11{stroke-dasharray:1052 1054;stroke-dashoffset:1053;animation:EUwIDAll_draw 2000ms ease-in-out 478ms forwards;}.EUwIDAll_12{stroke-dasharray:304 306;stroke-dashoffset:305;animation:EUwIDAll_draw 2000ms ease-in-out 521ms forwards;}.EUwIDAll_13{stroke-dasharray:260 262;stroke-dashoffset:261;animation:EUwIDAll_draw 2000ms ease-in-out 565ms forwards;}.EUwIDAll_14{stroke-dasharray:254 256;stroke-dashoffset:255;animation:EUwIDAll_draw 2000ms ease-in-out 608ms forwards;}.EUwIDAll_15{stroke-dasharray:0 2;stroke-dashoffset:1;animation:EUwIDAll_draw 2000ms ease-in-out 652ms forwards;}.EUwIDAll_16{stroke-dasharray:496 498;stroke-dashoffset:497;animation:EUwIDAll_draw 2000ms ease-in-out 695ms forwards;}.EUwIDAll_17{stroke-dasharray:805 807;stroke-dashoffset:806;animation:EUwIDAll_draw 2000ms ease-in-out 739ms forwards;}.EUwIDAll_18{stroke-dasharray:898 900;stroke-dashoffset:899;animation:EUwIDAll_draw 2000ms ease-in-out 782ms forwards;}.EUwIDAll_19{stroke-dasharray:946 948;stroke-dashoffset:947;animation:EUwIDAll_draw 2000ms ease-in-out 826ms forwards;}.EUwIDAll_20{stroke-dasharray:772 774;stroke-dashoffset:773;animation:EUwIDAll_draw 2000ms ease-in-out 869ms forwards;}.EUwIDAll_21{stroke-dasharray:373 375;stroke-dashoffset:374;animation:EUwIDAll_draw 2000ms ease-in-out 913ms forwards;}.EUwIDAll_22{stroke-dasharray:710 712;stroke-dashoffset:711;animation:EUwIDAll_draw 2000ms ease-in-out 956ms forwards;}.EUwIDAll_23{stroke-dasharray:326 328;stroke-dashoffset:327;animation:EUwIDAll_draw 2000ms ease-in-out 1000ms forwards;}@keyframes EUwIDAll_draw{100%{stroke-dashoffset:0;}}@keyframes EUwIDAll_fade{0%{stroke-opacity:1;}94.44444444444444%{stroke-opacity:1;}100%{stroke-opacity:0;}}</style>
					</svg>
				</div>
			</section>
			<div class="ov-h" id="wrapper">
				<header>
					<div class="user-login d-none d-lg-block">
						<div class="wrap-1">
							<div class="title">Tài khoản</div><i class="ri-close-line close-button-3"></i>
						</div>
						<div class="wrap-2 user-admin">
							<div class="bl-1"><img src="./assets/avatar/avatar-girl.png" alt="">
								<div class="content"> <b>Leo Đình Lỗ</b>
									<p>Khách</p>
								</div>
							</div>
							<div class="bl-3">
								<div class="title-bl3"> <span class="material-icons">portrait</span>
									<p> <a href="">Quản lý tài khoản cá nhân</a></p>
								</div>
								<ul>
									<li> <a class="active" href="">Trang thay đổi thông tin cá nhân </a></li>
									<li> <a href="">Thay đổi mật khẩu</a></li>
									<li> <a href="">Số dư tài khoản </a></li>
									<li> <a href="">Nạp tiền</a></li>
								</ul>
								<div class="title-bl3"> <span class="material-icons">list_alt</span>
									<p> <a href="">Quản lý tin đăng</a></p>
								</div>
								<ul>
									<li> <a href="">Tin đã đăng</a></li>
									<li> <a href="">Tin chờ đăng</a></li>
									<li> <a href="">Chờ xác nhận </a></li>
								</ul>
							</div>
							<div class="bl-4"> <span class="material-icons">exit_to_app</span>
								<p>Thoát tài khoản</p>
							</div>
						</div>
					</div>
					<div class="max-width-container container-mb">
						<nav>
							<div class="nav-desktop">
								<div class="logo"><a href="index.html"><img src="./assets/logo/logo-s.png" alt=""></a></div>
								<div class="main-nav">
									<ul class="nav-list">
										<li class="nav-item">
											<div class="yeuthich"><i class="ri-heart-fill icon"></i>
												<div class="number-yt">1</div>
											</div>
											<p class="text">Yêu thích</p>
										</li>
										<li class="nav-item">
											<div class="sosanh-num"><i class="ri-equalizer-line icon"></i>
												<div class="number-ss">1</div>
											</div>
											<p class="text">So sánh</p>
										</li>
										<li class="nav-item"><i class="ri-time-line icon"></i>
											<p class="text">Lịch sử</p>
										</li>
										<li class="nav-item thong-bao">
											<div class="thong-bao-num"><i class="fas fa-bell icon"></i>
												<div class="number-tb">1</div>
											</div>
											<p class="text">Thông báo</p>
											<div class="wrap-list-thongbao">
												<div class="wrap-1">
													<p>Thông báo mới</p><em class="material-icons close">close</em>
												</div>
												<div class="wrap-2">
													<div class="khong-thong-bao"> <img src="./assets/icon/icon-notification.png" alt="">
														<p>Không có thông báo nào</p>
													</div>
													<div class="co-thong-bao">
														<div class="item">
															<div class="wrap-text">
																<div class="thongbao post-expired">Bài viết hết hạn</div><a href="#">Bài viết của bạn sắp hết hạn</a>
																<div class="date">1/11/2020 </div>
															</div>
														</div>
														<div class="item">
															<div class="wrap-text">
																<div class="thongbao thongbao-color">Thông báo</div><a href="#">Thông báo khuyến mãi nạp thẻ cho  nhân diệp 20/10 20/10/2020 - 20/12/2020</a>
																<div class="date">1/11/2020</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="nav-item tin-tuc-icon"><em class="material-icons icon">list_alt</em><a class="text" href="">Tin tức</a></li>
										<li class="post-new"><i class="ri-chat-new-fill icon"></i><a class="text" href="" data-toggle="modal" data-target="#dangnhapModal">Đăng bài</a></li>
										<li class="nav-item d-none user-logined"><img class="avatar-login" src="./assets/avatar/avatar-girl.png" alt=""></li>
										<li class="nav-item">
											<button class="btn btn__header">Đăng Nhập </button>
										</li>
										<li class="nav-item">
											<div class="avatar-user"> <img src="./assets/avatar/avatar.png" alt=""></div>
										</li>
										<li class="nav-item change-lang"><span class="button-change-lang"><img src="./assets/icon/iconvn.png" alt=""><i class="ri-arrow-down-s-fill"></i>
												<div class="list-change-lang">
													<div class="list-change-lang-row"><img src="./assets/icon/iconvn.png" alt="">
														<p>Tiếng việt</p>
													</div>
													<div class="list-change-lang-row"><img src="./assets/icon/icon-usa.png" alt="">
														<p>English</p>
													</div>
												</div></span></li>
									</ul>
								</div>
							</div>
							<div class="nav-mobile">
								<div class="nav-mobile-1">
									<div class="img"><img src="./assets/logo/logo-res-white.png" alt=""></div>
									<div class="button-mobile-post">
										<button class="button-mbp"><i class="ri-chat-new-fill icon"></i><span>Đăng bài</span></button>
										<div class="sosanh"><i class="ri-equalizer-line icon"></i></div>
										<div class="yeuthich"><i class="ri-heart-fill icon"></i></div>
									</div>
								</div>
								<div class="nav-mobile-2">
									<div class="toggle-menu"><i class="ri-grid-fill"></i></div>
									<div class="search-menu">
										<input type="text" placeholder="Bạn tìm gì hôm nay?">
									</div>
									<div class="user user-menu"><i class="ri-map-pin-user-fill"></i></div>
								</div>
							</div>
							<div class="menu-mobile">
								<div class="wrap-1">
									<div class="logo"> <a href=""><img src="./assets/logo/logo-s.png" alt=""></a></div><i class="ri-close-line close-button"></i>
								</div>
								<div class="wrap-2">
									<div class="change-lang">
										<div class="left"><img src="./assets/icon/vn.svg" alt="">
											<p>Tiếng việt</p>
										</div>
										<div class="right"><i class="ri-arrow-down-s-fill"></i></div>
									</div>
									<ul class="list-items">
										<li class="list-item"> <a href=""><i class="ri-heart-fill icon"></i>
												<p class="text">Yêu thích</p></a></li>
										<li class="list-item"> <a href=""><i class="ri-time-line icon"></i>
												<p class="text">Lịch sử</p></a></li>
										<li class="list-item"> <a href=""><i class="fas fa-bell icon"></i>
												<p class="text">Thông báo</p></a></li>
									</ul>
								</div>
								<div class="wrap-3">
									<div class="title">
										 Công ty <i class="ri-arrow-down-s-fill"></i></div>
									<ul>
										<li><a href="">Tuyển dụng</a></li>
										<li><a href="">Quy chế hoạt động</a></li>
										<li><a href="">Về Vifland</a></li>
										<li><a href="">Điều khoản thỏa thuận</a></li>
										<li><a href="">Tin tức cổ đông</a></li>
									</ul>
									<div class="title">
										 Hỗ trợ<i class="ri-arrow-down-s-fill"></i></div>
									<ul>
										<li><a href="">Tuyển dụng</a></li>
										<li><a href="">Quy chế hoạt động</a></li>
										<li><a href="">Về Vifland</a></li>
										<li><a href="">Điều khoản thỏa thuận</a></li>
										<li><a href="">Tin tức cổ đông</a></li>
									</ul>
								</div>
								<div class="wrap-4">
									<div class="title">Công ty Cổ phần Tập đoàn Meey Land</div>
									<ul>
										<li><span class="material-icons">location_on</span>
											<p>Tầng 5 Tòa nhà 97 - 99 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, Thành phố Hà Nội</p>
										</li>
										<li><span class="material-icons">call</span>
											<p>0869 092 929</p>
										</li>
										<li><span class="material-icons">email</span>
											<p>contact@meeyland.com</p>
										</li>
									</ul>
								</div>
								<div class="wrap-5">
									<p>© 2011-2020 Công ty Cổ Phần Tập Đoàn Vif Land</p>
								</div>
							</div>
							<div class="user-mobile">
								<div class="wrap-1">
									<div class="title">Tài khoản</div><i class="ri-close-line close-button-2"></i>
								</div>
								<div class="wrap-2 user-admin">
									<div class="bl-1"><img src="./assets/avatar/avatar-girl.png" alt="">
										<p>Xibachao</p>
									</div>
									<div class="bl-2">
										<div class="row">
											<div class="col-6"><span class="vifPay"> <img src="./assets/icon/card.png" alt="">VifPay</span></div>
											<div class="col-6"><span class="lkngay"><a href="">Liên kết ngay <span class="material-icons">keyboard_arrow_right</span></a></span></div>
											<div class="col-12"><span class="lkvi"><img src="./assets/icon/warning.png" alt="">Chưa liên kết ví</span><span class="text">Liên kết để hưởng khuyến mãi với ưu đãi bạn nhé</span></div>
										</div>
									</div>
									<div class="bl-3">
										<div class="title-bl3"> <span class="material-icons">portrait</span>
											<p>Quản lý tài khoản cá nhân</p>
										</div>
										<ul>
											<li> <a class="active" href="">Trang thay đổi thông tin cá nhân </a></li>
											<li> <a href="">Thay đổi mật khẩu</a></li>
											<li> <a href="">Số dư tài khoản </a></li>
											<li> <a href="">Nạp tiền</a></li>
										</ul>
										<div class="title-bl3"> <span class="material-icons">list_alt</span>
											<p>Quản lý tin đăng</p>
										</div>
										<ul>
											<li> <a href="">Tin đã đăng</a></li>
											<li> <a href="">Tin chờ đăng</a></li>
											<li> <a href="">Chờ xác nhận </a></li>
										</ul>
									</div>
									<div class="bl-4"> <span class="material-icons">exit_to_app</span>
										<p>Thoát tài khoản</p>
									</div>
								</div>
							</div>
							<div class="bg-menu"></div>
						</nav>
					</div>
				</header>
				<div class="wrap-modal-post">
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content"><a class="box" href="#"><img src="./assets/index/mua-ban-nha-dat.png" alt="">
									<p>Mua/ Bán</p><em class="material-icons">double_arrow</em></a><a class="box" href="#"><img src="./assets/index/cho-thue-nha-dat.png" alt="">
									<p>Thuê/ Cho Thuê</p><em class="material-icons">double_arrow</em></a><a class="box" href="#"><img src="./assets/index/sang-nhuong-nha-dat.png" alt="">
									<p>Sang Nhượng</p><em class="material-icons">double_arrow</em></a></div>
						</div>
					</div>
				</div>
				<div class="wrap-modal-dangnhap">
					<div class="modal fade" id="dangnhapModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<h3 class="title">Đăng nhập</h3>
								<p>Bạn cần đăng nhập để sử dụng chức năng này. Bạn có muốn đăng nhập không?</p>
								<div class="wrap-button">
									<button class="btn-huy" type="button" data-dismiss="modal">Hủy</button><a class="btn-login" href="">Đăng nhập</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<main>
					<section class="banner-top">
						<div class="img"> </div>
					</section>
					<div class="global-breadcrumb">
						<div class="max-width-container">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"> <i class="ri-arrow-left-line icons-breadcrum"></i>Mua/ Bán <span class="sll-breadcrum">&nbsp; (1.475.822 tin đăng)</span></a></li>
								<li class="breadcrumb-item"><a href="#">
										<p>Mở bán dự án đô thị sinh thái thông minh Aqua City, phía Đông thành phố Hồ Chí Minh Bạn tìm gì hôm nay?</p></a></li>
							</ol>
						</div>
					</div>
					<section class="pages-news-list">
						<div class="container">
							<div class="nav-news-list">
								<nav>
                                    {{-- tin tức --}}
									<ul class="nav-list">
										<li class="nav-item active"><a>Tin tặc</a></li>
										<li class="nav-item"><a>Tin bặc bặc</a></li>
										<li class="nav-item"><a>Tin bặc bặc bặc</a></li>
										<li class="nav-item"><a>CC</a></li>
										<li class="nav-item"><a>Má nó tức á</a></li>
									</ul>
								</nav>
							</div>
							<h1 class="section-title text-uppercase">tin tức mới nhất </h1>
							<div class="row sec-1">
								<div class="col-xl-6 col-md-6 col-12">
									<div class="article-big">
										<div class="img"><a class="bg" href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
										<div class="content"> <a href="">
												<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, facilis? Ex exercitationem ullam optio, repudiandae iure porro expedita necessitatibus aspernatur vitae placeat temporibus reiciendis rerum. Nisi, est atque. Ratione, ducimus!</p>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-md-6 col-12 wrapper">
									<div class="article-wrapper">
										<div class="date">
											<p>29.09.2020</p>
										</div>
										<div class="article-small">
											<div class="img"><a href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
											<div class="content"> <a href="">
													<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											</div>
										</div>
									</div>
									<div class="article-wrapper">
										<div class="date">
											<p>29.09.2020</p>
										</div>
										<div class="article-small">
											<div class="img"><a href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
											<div class="content"> <a href="">
													<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											</div>
										</div>
									</div>
								</div>
                            </div>
                            {{-- h1 --}}
                            <h1>TIN TỨC TẤT CẢ</h1>
							<div class="row sec-2">
								<div class="col-xl-4 col-md-4 col-sm-6 wrapper">
									<div class="article-wrapper">
										<div class="date">
											<p>29.09.2020</p>
										</div>
										<div class="article-small">
											<div class="img"><a href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
											<div class="content"><a href="">
													<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-4 col-sm-6 wrapper">
									<div class="article-wrapper">
										<div class="date">
											<p>29.09.2020</p>
										</div>
										<div class="article-small">
											<div class="img"><a href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
											<div class="content"><a href="">
													<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-4 col-sm-6 wrapper">
									<div class="article-wrapper">
										<div class="date">
											<p>29.09.2020</p>
										</div>
										<div class="article-small">
											<div class="img"><a href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
											<div class="content"><a href="">
													<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-4 col-sm-6 wrapper">
									<div class="article-wrapper">
										<div class="date">
											<p>29.09.2020</p>
										</div>
										<div class="article-small">
											<div class="img"><a href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
											<div class="content"><a href="">
													<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-4 col-sm-6 wrapper">
									<div class="article-wrapper">
										<div class="date">
											<p>29.09.2020</p>
										</div>
										<div class="article-small">
											<div class="img"><a href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
											<div class="content"><a href="">
													<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-4 col-sm-6 wrapper">
									<div class="article-wrapper">
										<div class="date">
											<p>29.09.2020</p>
										</div>
										<div class="article-small">
											<div class="img"><a href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
											<div class="content"><a href="">
													<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-4 col-sm-6 wrapper">
									<div class="article-wrapper">
										<div class="date">
											<p>29.09.2020</p>
										</div>
										<div class="article-small">
											<div class="img"><a href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
											<div class="content"><a href="">
													<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-4 col-sm-6 wrapper">
									<div class="article-wrapper">
										<div class="date">
											<p>29.09.2020</p>
										</div>
										<div class="article-small">
											<div class="img"><a href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
											<div class="content"><a href="">
													<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-4 col-sm-6 wrapper">
									<div class="article-wrapper">
										<div class="date">
											<p>29.09.2020</p>
										</div>
										<div class="article-small">
											<div class="img"><a href=""><img src="./assets/news/bds_1.jpg" alt=""></a></div>
											<div class="content"><a href="">
													<h2 class="section-under-title">"Đây" là tiêu đề </h2></a>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, minima laudantium. Voluptatem alias quibusdam ex non repellendus quidem magni laudantium accusantium, pariatur, blanditiis soluta natus dicta aliquid inventore quae officiis? </p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="paginationSP mx-auto">
								<div class="paginationSP-box mx-auto"><span class="material-icons button-s">skip_previous</span>
									<ul>
										<li> <a class="active" href="">1</a></li>
										<li> <a href="">2</a></li>
										<li> <a href="">3</a></li>
									</ul><span class="3cham">...</span><a class="last-pg" href="">4534</a><span class="material-icons button-s">skip_next</span>
								</div>
							</div>
						</div>
					</section>
					<div id="js-page-verify" hidden></div>
				</main>

			</div>

		</form>
		<script type="text/javascript" src="./js/core.min.js"></script>
		<script type="text/javascript" src="./js/main.min.js"> </script>
	</body>
</html>
