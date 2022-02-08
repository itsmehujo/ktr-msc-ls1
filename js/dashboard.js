const businesses_list = document.getElementById( 'businesses_list' );
fetch( '../php/fetchBusinesses' ).then( res => res.json() ).then( ( { businesses } ) => {
    businesses.forEach( business => {
      const div = document.createElement( 'div' );
      div.classList.add( 'business_card' );
      const name = document.createElement( 'span' );
      business.name ? name.innerText = business.name : name.innerText = 'No name yet';
      const company_name = document.createElement( 'span' );
      business.company_name ? company_name.innerText = business.company_name : company_name.innerText = 'No company name yet';
      const email = document.createElement( 'a' );
      email.innerHTML = `mailto:${ business.email }`;
      let phone;
      business.phone ? phone = document.createElement( 'a' ) : phone = docunent.createElement( 'span' );
      business.phone ? phone.innerHTML = `tel:${ business.phone }` : 'No phone yet';
      div.appendChild( name )
      div.appendChild( company_name )
      div.appendChild( email )
      div.appendChild( phone )
      businesses_list.appendChild( div )
    } )
  }
)

const header = document.getElementById( 'header' );
fetch( '../php/fetchUser.php' ).then( res => res.json() ).then( ( { currentUser } ) => {
  const uName = document.createElement( 'span' );
  uName.innerText = currentUser.name;
  header.appendChild( uName );
} )