<style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
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
        .section {
            display: none;
            padding: 20px;
            text-align: center;
        }
        .section.active {
            display: block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
            color: #333;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #ddd;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh; /* Set the height to viewport height */
        }
    </style>