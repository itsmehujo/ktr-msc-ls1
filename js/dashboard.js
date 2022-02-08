const businesses_list = document.getElementById( 'businesses_list' );
fetch( './php/fetchBusinesses.php' ).then( res => res.json() ).then( ( { businesses } ) => {
    businesses.forEach( business => {
      console.log( business.phone );
      const div = document.createElement( 'div' );
      div.classList.add( 'business_card' );
      const name = document.createElement( 'span' );
      business.name ? name.innerText = business.name : name.innerText = 'No name yet';
      const company_name = document.createElement( 'span' );
      business.company_name ? company_name.innerText = business.company_name : company_name.innerText = 'No company name yet';
      const email = document.createElement( 'a' );
      email.innerText = `${ business.email }`;
      email.href = `mailto:${ business.email }`;
      const phone = document.createElement( 'span' );
      business.phone !== '0' ? phone.innerText = `${ business.phone }` : phone.innerText = 'No phone yet';
      div.appendChild( name )
      div.appendChild( company_name )
      div.appendChild( email )
      div.appendChild( phone )
      businesses_list.appendChild( div )
    } )
  }
)
