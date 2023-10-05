@props(['color' => 'red', 'onPress' => null])

<div style="display: flex;
width: 30%;
height: 3rem;
min-height: 50px;
border-radius: 24px;
margin: 2.5% 1.5%;
align-items: center;
justify-content: center;
background-color: {{ $color }};
filter: drop-shadow(5px 5px 4px rgba(176, 127, 255, 0.49));
opacity: 0.5;
cursor: pointer;
"
    onclick="onStyleClick(this, '{{ $slot }}')">
    <p
        style="font-size: 100%; font-weight: 600; cursor: pointer;
     user-select: none;
    -webkit-user-select: none; /* Safari */
    -moz-user-select: none; /* Firefox */
    -ms-user-select: none; /* IE/Edge */">
        {{ $slot }}</p>
</div>
