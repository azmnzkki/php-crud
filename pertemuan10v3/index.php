<?php

require 'koneksi.php';

$guests = getData("SELECT * FROM guests");

?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
</head>

<body class="overflow-x-hidden">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
            <div class="container-top flex justify-between mb-8">
                <h1 class="text-2xl font-bold">List Tamu Hotel</h1>
                <button class="bg-sky-600 text-white px-3 py-2 rounded-xl font-medium hover:bg-sky-800"><a href="./insert.php">Add New Data</a></button>
            </div>
            <table class="min-w-full">
                <thead class="bg-slate-300">
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">No</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Nama Tamu</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Nomor Kamar</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Tanggal Check In</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Tanggal Check Out</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Action</th>


                </thead>

                <?php $no = 1; ?>
                <?php foreach ($guests as $guest) : ?>

                    <tbody class="bg-white">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm leading-5 text-gray-800"><?= $no ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900"><?= $guest["nama_tamu"] ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"><?= $guest["nomor_kamar"] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"><?= $guest["tanggal_check_in"] ?></td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"><?= $guest["tanggal_check_out"] ?></td>


                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5">
                                <div class="container-icon flex gap-3 ">
                                    <a href="edit.php? id=<?= $guest['id'] ?>" class="bg-green-500 p-2 rounded-md hover:bg-green-700 transition-all duration-300 ease-in-out"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-white transition-all duration-300 ease-in-out" viewBox="0 0 256 256">
                                            <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path>
                                        </svg></a>
                                    <a href="delete.php? id=<?= $guest['id'] ?>" onclick="return confirm('are you sure ?')" class=" bg-red-500 p-2 rounded-md hover:bg-red-700 transition-all duration-300 ease-in-out"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-white transition-all duration-300 ease-in-out" viewBox="0 0 256 256">
                                            <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                                        </svg></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                    <?php $no++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>