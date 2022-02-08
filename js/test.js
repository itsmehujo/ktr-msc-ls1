fetch( './php/fetchUser.php' ).then( us => us.json() ).then( us => {
  console.log( us );
} )