    <!-- Required meta tags -->
    <style>

        .sidebar {
            width: 100px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .sidebar h2 {
            margin-bottom: 10px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: block;
            text-decoration: none;
            color: #333;
            padding: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #ddd;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    margin-left: 20px; /* Add this line */
}


        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .present {
            color: black;
        }

        .absent {
            color: red;
        }

        /* Toggle Button Styles */
        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #4CAF50;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(20px);
            -ms-transform: translateX(20px);
            transform: translateX(20px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 20px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        .sidebar {
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 20px;
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar ul li {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .sidebar button {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .sidebar {
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 20px;
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar ul li {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .toggle-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .submit-button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            float: right; /* Float the button to the right */
        }

        .submit-button:hover {
            background-color: darkgreen;
        }
        
   


.time-filter-container {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px; /* Adds some space between time filter and the rest of the content */
}
nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color:darkslateblue;
            color: white;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
      
        .registrar-info {
            text-align: center; /* Align text in the middle */
            flex-grow: 1; /* Take up remaining space */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

    
        
        .logout button {
            background-color: #e53e3e;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .logout button:hover {
            background-color: #c53030;
        }
        .navbar {
            display: flex;
            justify-content: center; /* Center the navigation horizontally */
            align-items: center; /* Center the logo vertically */
            background-color:gold;
            padding: 10px;
        }
        img {
            width: 50px; /* Adjust width of the logo */
            height: 50px; /* Adjust height of the logo */
            margin-right: 10px; /* Add some space between logo and links */
        }
        .navbar a {
            color: black;
            text-decoration: none;
            padding: 8px 16px;
            display: inline-block; /* Display links as blocks */
            cursor: pointer;
            border: 1px solid transparent; /* Add border */
            border-radius: 4px; /* Rounded corners */
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar a.active {
            background-color: #4a5568;
            color: white;
            border-color: #4a5568; /* Change border color on active link */
        }

    </style>