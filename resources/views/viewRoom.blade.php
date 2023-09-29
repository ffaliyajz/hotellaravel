<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trivago Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        @font-face {
            font-family: 'figtree';
            src: url('https://fonts.bunny.net/figtree/400.woff2') format('woff2'),
                url('https://fonts.bunny.net/figtree/400.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'figtree', Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .room-list { /* Changed from hotel-list */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .room-card { /* Changed from hotel-card */
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            width: calc(33.33% - 20px);
            box-sizing: border-box;
        }

        .room-image { /* Changed from hotel-image */
            height: 200px;
            overflow: hidden;
        }

        .room-image img { /* Changed from hotel-image img */
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .room-details { /* Changed from hotel-details */
            padding: 15px;
        }

        .room-title { /* Changed from hotel-title */
            font-size: 20px;
            margin: 0;
        }

        .room-description { /* Changed from hotel-description */
            font-size: 14px;
            margin: 10px 0;
        }

        /* Button Container for Horizontal Layout */
        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        /* Style for Room Buttons */ /* Changed from hotel-button */
        .room-button {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .room-button:hover { /* Changed from hotel-button:hover */
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>List of Rooms<h1>
    </header>

    <div class="container">
        <h2>Featured Rooms</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewRoom{{$hotel->id}}">Add New Room</button>
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="newRoomModal" 
            data-bs-target="#addNewRoom{{$hotel->id}}" data-bs-whatever="@mdo">Add New Room</button> --}}
        @include('newRoomModal')

        {{-- @if (isset($hotel)) 
            @php
                $hotelIdToShow = request('id');
                $selectedHotel = $hotel->firstWhere('id', $hotelIdToShow);
            @endphp
                
        @endif --}}

        <br><br><h3 class="room-title">List of Room Available from {{$hotel->name}}</h3><br>
        <div class="room-list">
                @foreach ($rooms as $room)
                    <div class="room-card">
                        <div class="room-image">
                            <img src="/images/{{$room->room_img}}.jpg" alt="Room 1">
                        </div>
                        <div class="room-details">
                            <h3 class="room-title">{{$room->room_name}}</h3>
                            <p><strong>Room Type:</strong> {{$room->room_type}}</p>
                            <p><strong>Price per Night: RM</strong> {{$room->price_per_night}}</p>

                            <div class="button-container">
                                <a href="#" class="room-button">
                                    <i class="fas fa-edit"></i> <!-- Update Icon -->
                                </a>
                                <a href="#" class="room-button">
                                    <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            {{-- <!-- Room Cards Go Here -->
            @if(isset($rooms) && !$rooms->isEmpty())                
                @foreach ($rooms as $room)
                    <div class="room-card">
                        <div class="room-image">
                            <img src="images/{{$room->room_img}}.jpg" alt="Room 1">
                        </div>
                        <div class="room-details">
                            <h3 class="room-title">{{$room->room_name}}</h3>
                            <p><strong>Room Type:</strong> {{$room->room_type}}</p>
                            <p><strong>Price per Night: RM</strong> ${{$room->price_per_night}}</p>

                            <div class="button-container">
                                <a href="#" class="room-button">
                                    <i class="fas fa-edit"></i> <!-- Update Icon -->
                                </a>
                                <a href="#" class="room-button">
                                    <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Hello World</p>
            @endif --}}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>
</html>
