@php
    $colorsCollection = collect($colors);
@endphp

<x-template :showHeader="true">
    <div class="container">
        <div class="sub-container" style="height: 15%">
            <p id="text">Choisissez vos styles favoris</p>
        </div>
        <div class="sub-container" style="height: 48%; align-items: flex-start;">
            <div id="sub-sub-container">
                @foreach ($musicStyle as $style)
                    @php
                        $randomColor = $colorsCollection->random();
                    @endphp
                    <x-elem-filter color="{{ $randomColor }}">{{ $style }}</x-elem-filter>
                @endforeach
            </div>
        </div>
        <form id="styleForm" action="/filters" method="GET" class="sub-container" style="height: 12%;">
            @csrf
            <input type="hidden" id="styleData" name="styleData" value="">
            <button type="submit" id="validated">VALIDER</button>
        </form>
    </div>

    <style>
        .container {
            display: flex;
            flex-direction: column;
            height: 90%;
            width: 100%;
            justify-content: space-evenly;
            align-items: center;
        }

        .sub-container {
            display: flex;
            width: 90%;
            max-width: 350px;
            justify-content: space-evenly;
            align-items: center;
            background-color: #F4EBEB;
            border-radius: 18px;
            filter: drop-shadow(5px 5px 4px rgba(176, 127, 255, 0.49));
        }

        #sub-sub-container {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            width: 100%;
            padding: 1% 5%;
            max-height: 100%;
            overflow: auto;
        }

        #text {
            font-size: 150%;
            font-weight: 900;
            text-align: center;
        }

        #validated {
            font-size: 200%;
            font-weight: 900;
        }
    </style>
    <script>
        let allStyle = [];

        function onStyleClick(element, style) {
            const i = allStyle.findIndex((elem) => elem === style)
            if (i !== -1) {
                allStyle.splice(i, 1);
                element.style.opacity = 0.5;
                return;
            }
            element.style.opacity = 1;
            allStyle.push(style)
        }

        document.getElementById("validated").addEventListener("click", function() {
            // console.log(document.cookie.split(";")[0].split("=")[1]); pour récupérer ma ptite ville avec mon petit cookie
            document.getElementById("styleData").value = JSON.stringify(allStyle);
            document.getElementById("styleForm").submit();
            return false;
        });
    </script>
</x-template>
