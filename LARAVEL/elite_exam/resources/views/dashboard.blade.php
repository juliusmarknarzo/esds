<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h1>Dashboard</h1>
<button id = "logout_button" style = "float: right; cursor: pointer">Logout</button>

<h3>Total number of albums sold per artist</h3>
<table id = "table_albums_sold_total_per_artist">
  <tr>
    <th>Artists</th>
    <th>Total Albums Sold</th>
  </tr>
</table>

<h3>Combined album sales per artist</h3>
<table id = "table_combined_album_sales_per_artist">
  <tr>
    <th>Artists</th>
    <th>Combined Sales</th>
  </tr>
</table>

<h3>Top 1 artist who sold most combined album sales</h3>
<table id = "table_top_one_artist_by_sold">
  <tr>
    <th>Artist</th>
    <th>Albums</th>
    <th>Date Release</th>
  </tr>
</table>

<h3>List of albums based on the searched artist</h3>

<input id = "search_artist_input" type = "text" name = "artist_search" placeholder = "Input Artist Name">
<input type = "submit" value = "Search" id = "search_artist_button"> 

<table id = "table_search_albums_by_artist">
  <thead>
  <tr>
    <th>Artist Name</th>
    <th>Album Name</th>
  </tr>
  </thead>
  <tbody>
  </tbody>
</table>

</body>
</html>


<script>
$(document).ready(function(){
  function getAlbumsSoldPerArtist(){
      $.ajax({
          url: '/api/albums-sold-total',
          type: 'GET',
          success: function (aResponse) {
            displayAlbumsSoldPerArtist(aResponse);
          }
    });
  }

  function getCombinesAlbumSalesPerArtist(){
      $.ajax({
          url: '/api/albums-sold-total',
          type: 'GET',
          success: function (aResponse) {
            displayCombinedAlbumSalesPerArtist(aResponse);
          }
    });
  }

  function getTopOneArtistBySold(){
      $.ajax({
          url: '/api/top-one-artist',
          type: 'GET',
          success: function (aResponse) {
            displayTopOneArtist(aResponse);
          }
    });
  }

  function getListOfAlbumsByArtist(){
      $.ajax({
          url: '/api/search-artist?name=' + $('#search_artist_input').val().trim(),
          type: 'GET',
          success: function (aResponse) {
            displayAlbumByArtist(aResponse);
          }
    });
  }

  function displayAlbumsSoldPerArtist(aData) {
    aData.forEach((oData) => {
      $('#table_albums_sold_total_per_artist').append('<tr><td>' + oData.name + '</td><td>' + oData.total_albums_sold + '<td></tr>');
    });
  }

  function displayCombinedAlbumSalesPerArtist(aData) {
    aData.forEach((oData) => {
      $('#table_combined_album_sales_per_artist').append('<tr><td>' + oData.name + '</td><td>' + oData.total_albums_sold + '<td></tr>');
    });
  }

  function displayTopOneArtist(aData) {
    aData.forEach((oData) => {
      $('#table_top_one_artist_by_sold').append('<tr><td>' + oData.name + '</td><td>' + oData.albums[0].sales + '<td></tr>');
    });
  }

  function displayAlbumByArtist(aData) {
    $('#table_search_albums_by_artist').find('tbody').empty();
    aData.forEach((oData) => {
      $('#table_search_albums_by_artist').find('tbody').append('<tr><td>' + oData.artist_name + '</td><td>' + oData.name + '<td></tr>');
    });
  }

  $('#search_artist_button').click(function() {
    getListOfAlbumsByArtist();
  });

  $('#logout_button').click(function () {
    $.ajax({
            url: '/logout_user',
            type: 'GET',
            success: function (oResponse) {
                if (oResponse.bResult === false) {
                    return alert(oResponse.message);
                }
                window.location.href = "/login";
            }
        });
  });



  getAlbumsSoldPerArtist();
  getCombinesAlbumSalesPerArtist();
  getTopOneArtistBySold();
});
</script>

