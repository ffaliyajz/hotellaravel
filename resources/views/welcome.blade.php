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

        .hotel-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .hotel-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            width: calc(33.33% - 20px);
            box-sizing: border-box;
        }

        .hotel-image {
            height: 200px;
            overflow: hidden;
        }

        .hotel-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hotel-details {
            padding: 15px;
        }

        .hotel-title {
            font-size: 20px;
            margin: 0;
        }

        .hotel-description {
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

        /* Style for Hotel Buttons */
        .hotel-button {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .hotel-button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <header>
        <h1>Trivago Booking Website </h1>
    </header>
    <div class="container">
        <h2>Featured Hotels</h2>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@mdo">Add New Hotel</button>
        @include('modal')


        <div class="hotel-list">
            <!-- Hotel Cards Go Here -->
            @foreach ($hotels as $hotel)
                <div class="hotel-card">
                    <div class="hotel-image">
                        <img src="/images/{{$hotel->img}}.jpg" alt="Hotel 1">
                    </div>
                    <div class="hotel-details">
                        <h3 class="hotel-title">{{$hotel->name}}</h3>
                        <p class="hotel-description">{{ $hotel->address }}</p>
                        <!-- Button Container for Horizontal Layout -->
                        <div class="button-container">
                            <a href="{{ route('viewRoom', ['hotel' => $hotel->id]) }}" class="hotel-button">View Room</a>

                            <a href="#" class="hotel-button" data-bs-toggle="modal" data-bs-target="#addNewRoom{{$hotel->id}}">
                                <i class="fas fa-plus"></i> <!-- Plus Icon -->
                            </a>

                            <a href="#" class="hotel-button" data-bs-toggle="modal" data-bs-target="#editModal{{$hotel->id}}">
                                <i class="fas fa-edit"></i> <!-- Edit Icon -->
                            </a>
                            <a href="#" class="hotel-button" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{$hotel->id}}">
                                <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                            </a>                                                 
                        </div>
                    </div>
                </div>

                <!-- Add New Room Modal for each hotel -->
                <div class="modal fade" id="addNewRoom{{$hotel->id}}" tabindex="-1" role="dialog" aria-labelledby="addNewRoom{{$hotel->id}}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addNewRoom{{$hotel->id}}Label">Add New Room</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('saveRoom', ['hotel_id' => $hotel->id]) }}" method="POST">
                                    @csrf
                                    <!-- Add your form fields for creating a new room here -->
                                    <div class="form-group">
                                        <label for="room_name">Room Name</label>
                                        <input type="text" class="form-control" id="room_name" name="room_name" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="room_type">Room Type</label>
                                        <select class="form-select" id="room_type" name="room_type" required>
                                            <option value="Single">Single</option>
                                            <option value="Double">Double</option>
                                            <option value="Suite">Suite</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="price_per_night">Price per Night</label>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">RM </span>
                                        <input type="number" class="form-control" id="price_per_night" name="price_per_night" aria-label="Amount (to the nearest RM)">
                                        <span class="input-group-text" required>.00</span>
                                      </div>

                                    <div class="mb-3">
                                        <label for="img" class="col-form-label">Image:</label>
                                        <input type="text" class="form-control" id="room_img" name="room_img"> <!-- Added name="img" and changed the input type to file for image upload -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Room</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Update Hotel Details Modal -->
                <div class="modal fade" id="editModal{{$hotel->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$hotel->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{$hotel->id}}">Edit Hotel Information</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Add a form here to edit hotel information -->
                                <form method="POST" action="{{ route('updateHotel', ['hotel' => $hotel->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    
                                    <!-- Add input fields to edit hotel name, address, etc. -->
                                    <div class="mb-3">
                                        <label for="editHotelName" class="col-form-label">Hotel Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$hotel->name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editHotelAddress" class="col-form-label">Hotel Address:</label>
                                        <textarea class="form-control" id="address" name="address">{{$hotel->address}}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="editImg" class="col-form-label">Image:</label>
                                        <input type="text" class="form-control" id="editImg" name="img">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        
                <!-- Delete  Hotel Details Confirmation Modal -->
                <div class="modal fade" id="deleteConfirmationModal{{$hotel->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this hotel?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form method="POST" action="{{ route('deleteHotel', ['hotel' => $hotel->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
