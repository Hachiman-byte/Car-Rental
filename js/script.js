$(document).ready(function(){
	$('.dropdown').click(function(){
		$('.options').slideToggle();
	});
	$(".match").click(function(){
		$(".matchhistory").slideToggle();
	
	});
	//add users
	$('.add').click(function(){
		$('.overlay1').removeClass('hide');
		$('.overlay1').addClass('show');
	});
	$('.close1').click(function(){
		$('.overlay1').removeClass('show');
		$('.overlay1').addClass('hide');
	});
	//edit users
	$('.edit').click(function(){
		$('.overlay2').removeClass('hide');
		$('.overlay2').addClass('show');
	});
	$('.close2').click(function(){
		$('.overlay2').removeClass('show');
		$('.overlay2').addClass('hide');
	});
	 $("#bookings").on("mouseenter mouseleave", function(){
    	$(".arrowcase2").toggleClass("hover");
    	$("#bookings").toggleClass("hover");
    });
	  $("#vehicle").on("mouseenter mouseleave", function(){
    	$(".arrowcase1").toggleClass("hover");
    	$("#vehicle").toggleClass("hover");
    });
    $("#bookings").on("click", function(){
    	$("#booknav").slideToggle();
    	$(".arrow2").toggleClass("rotate");
    });
    $("#vehicle").on("click", function(){
    	$("#vehiclenav").slideToggle();
    	$(".arrow1").toggleClass("rotate");
    });
    $("#profile").click(function(){
    	$("#dropdown").slideToggle();
    });
    var stateList = [
      { Country: 'Oriental Mindoro', State: 'Calapan' },
      { Country: 'Oriental Mindoro', State: 'Perto Galera' },
      { Country: 'Oriental Mindoro', State: 'San Teodoro' },
      { Country: 'Oriental Mindoro', State: 'Baco' },
      { Country: 'Oriental Mindoro', State: 'Naujan' },
      { Country: 'Oriental Mindoro', State: 'Victoria' },
      { Country: 'Oriental Mindoro', State: 'Socorro' },
      { Country: 'Oriental Mindoro', State: 'Pola' },
      { Country: 'Oriental Mindoro', State: 'Pinamalayan' },
      { Country: 'Oriental Mindoro', State: 'Gloria' },
      { Country: 'Oriental Mindoro', State: 'Bansud' },
      { Country: 'Oriental Mindoro', State: 'Bongabong' },
      { Country: 'Oriental Mindoro', State: 'Roxas' },
      { Country: 'Oriental Mindoro', State: 'Mansalay' },
      { Country: 'Oriental Mindoro', State: 'Bulalacao' },

      { Country: 'Occidental Mindoro', State: 'Paluan' },
      { Country: 'Occidental Mindoro', State: 'Abra De Ilog' },
      { Country: 'Occidental Mindoro', State: 'Mamburao' },
      { Country: 'Occidental Mindoro', State: 'Sta. Cruz' },
      { Country: 'Occidental Mindoro', State: 'Sablayan' },
      { Country: 'Occidental Mindoro', State: 'Calintaan' },
      { Country: 'Occidental Mindoro', State: 'Rizal' },
      { Country: 'Occidental Mindoro', State: 'San Jose' },
      { Country: 'Occidental Mindoro', State: 'Magsaysay' }
    ];

      var cityList = [
      { State: 'Paluan', city: 'Alipaoy' },
      { State: 'Paluan', city: 'Harrison' },
      { State: 'Paluan', city: 'Lumangbayan' },
      { State: 'Paluan', city: 'Mananao' },
      { State: 'Paluan', city: 'Marikit I' },
      { State: 'Paluan', city: 'Mapalad Pob. ( Barangay 1)' },
      { State: 'Paluan', city: 'Handang Tumulong Pob. ( Barangay 2)' },
      { State: 'Paluan', city: 'Silahis Ng Pag-Asa Pob. ( Barangay 3)' },
      { State: 'Paluan', city: 'Pag-Asa Ng Bayan Pob. (Barangay 4)' },
      { State: 'Paluan', city: 'Bagong Silang Pob. (Barangay 5)' },
      { State: 'Paluan', city: 'San Jose Pob. (Barangay 6)' },
      { State: 'Paluan', city: 'Tubili' },

      { State: 'Abra De Ilog', city: 'Armado' },
      { State: 'Abra De Ilog', city: 'Balao' },
      { State: 'Abra De Ilog', city: 'Cabacao' },
      { State: 'Abra De Ilog', city: 'Lumangbayan' },
      { State: 'Abra De Ilog', city: 'Poblacion' },
      { State: 'Abra De Ilog', city: 'San Vicente' },
      { State: 'Abra De Ilog', city: 'Santa Maria' },
      { State: 'Abra De Ilog', city: 'Tibag' },
      { State: 'Abra De Ilog', city: 'Udalo' },
      { State: 'Abra De Ilog', city: 'Wawa' },

      { State: 'Calapan', city: 'Balingayan' },
      { State: 'Calapan', city: 'Balite' },
      { State: 'Calapan', city: 'Baruyan' },
      { State: 'Calapan', city: 'Batino' },
      { State: 'Calapan', city: 'Bayanan I' },
      { State: 'Calapan', city: 'Bayanan II' },
      { State: 'Calapan', city: 'Biga' },
      { State: 'Calapan', city: 'Bondoc' },
      { State: 'Calapan', city: 'Bucayao' },
      { State: 'Calapan', city: 'Buhuan' },
      { State: 'Calapan', city: 'Bulusan' },
      { State: 'Calapan', city: 'Calero' },
      { State: 'Calapan', city: 'Camansihan' },
      { State: 'Calapan', city: 'Camilmil' },
      { State: 'Calapan', city: 'Canubing I' },
      { State: 'Calapan', city: 'Canubing II' },
      { State: 'Calapan', city: 'Comunal' },
      { State: 'Calapan', city: 'Guinobatan' },
      { State: 'Calapan', city: 'Gulod' },
      { State: 'Calapan', city: 'Gutad' },
      { State: 'Calapan', city: 'Ibaba East' },
      { State: 'Calapan', city: 'Ibaba West' },
      { State: 'Calapan', city: 'Ilaya' },
      { State: 'Calapan', city: 'Lalud' },
      { State: 'Calapan', city: 'Lazareto' },
      { State: 'Calapan', city: 'Libis' },
      { State: 'Calapan', city: 'Lumang Bayan' },
      { State: 'Calapan', city: 'Mahal na Pangalan' },
      { State: 'Calapan', city: 'Maidlang' },
      { State: 'Calapan', city: 'Malad' },
      { State: 'Calapan', city: 'Malamig' },
      { State: 'Calapan', city: 'Managpi' },
      { State: 'Calapan', city: 'Masipit' },
      { State: 'Calapan', city: 'Nag-iba I' },
      { State: 'Calapan', city: 'Nag-iba II' },
      { State: 'Calapan', city: 'Navotas' },
      { State: 'Calapan', city: 'Pachoca' },
      { State: 'Calapan', city: 'Palhi' },
      { State: 'Calapan', city: 'Panggalaan' },
      { State: 'Calapan', city: 'Parang' },

      { State: 'Perto Galera', city: 'Aninuan' },
      { State: 'Perto Galera', city: 'Baclayan' },
      { State: 'Perto Galera', city: 'Balatero' },
      { State: 'Perto Galera', city: 'Dulangan' },
      { State: 'Perto Galera', city: 'Palangan' },
      { State: 'Perto Galera', city: 'Sabang' },
      { State: 'Perto Galera', city: 'San Antonio' },
      { State: 'Perto Galera', city: 'San Isidro' },
      { State: 'Perto Galera', city: 'Santo Niño' },
      { State: 'Perto Galera', city: 'Sinandigan' },
      { State: 'Perto Galera', city: 'Tabinay' },
      { State: 'Perto Galera', city: 'Villaflor' },
      { State: 'Perto Galera', city: 'Poblacion' },


      { State: 'San Teodoro', city: 'Bigaan' },
      { State: 'San Teodoro', city: 'Calangatan' },
      { State: 'San Teodoro', city: 'Calsapa' },
      { State: 'San Teodoro', city: 'Ilag' },
      { State: 'San Teodoro', city: 'Lumangbayan' },
      { State: 'San Teodoro', city: 'Tacligan' },
      { State: 'San Teodoro', city: 'Poblacion' },
      { State: 'San Teodoro', city: 'Caagutayan' },


      { State: 'Baco', city: 'Alag' },
      { State: 'Baco', city: 'Bangkatan' },
      { State: 'Baco', city: 'Burbuli' },
      { State: 'Baco', city: 'Catwiran I' },
      { State: 'Baco', city: 'Catwiran II' },
      { State: 'Baco', city: 'Dulangan I' },
      { State: 'Baco', city: 'Dulangan II' },
      { State: 'Baco', city: 'Lumang Bayan' },
      { State: 'Baco', city: 'Malapad' },
      { State: 'Baco', city: 'Mangangan I' },
      { State: 'Baco', city: 'Mangangan II' },
      { State: 'Baco', city: 'Mayabig' },
      { State: 'Baco', city: 'Pambisan' },
      { State: 'Baco', city: 'Pulang-Tubig' },
      { State: 'Baco', city: 'Putican-Cabulo' },
      { State: 'Baco', city: 'San Andres' },
      { State: 'Baco', city: 'San Ignacio (Dulangan)' },
      { State: 'Baco', city: 'Santa Cruz' },
      { State: 'Baco', city: 'Santa Rosa I' },
      { State: 'Baco', city: 'Santa Rosa II' },
      { State: 'Baco', city: 'Tabon-tabon' },
      { State: 'Baco', city: 'Tagumpay' },
      { State: 'Baco', city: 'Water' },
      { State: 'Baco', city: 'Baras (Mangyan Minority)' },
      { State: 'Baco', city: 'Bayanan' },
      { State: 'Baco', city: 'Lantuyang (Mangyan Minority)' },
      { State: 'Baco', city: 'Poblacion' },

      { State: 'Naujan', city: 'Adrialuna' },
      { State: 'Naujan', city: 'Antipolo' },
      { State: 'Naujan', city: 'Apitong' },
      { State: 'Naujan', city: 'Arangin' },
      { State: 'Naujan', city: 'Aurora' },
      { State: 'Naujan', city: 'Bacungan' },
      { State: 'Naujan', city: 'Bagong Buhay' },
      { State: 'Naujan', city: 'Bancuro' },
      { State: 'Naujan', city: 'Barcenaga' },
      { State: 'Naujan', city: 'Bayani' },
      { State: 'Naujan', city: 'Buhangin' },
      { State: 'Naujan', city: 'Concepcion' },
      { State: 'Naujan', city: 'Dao' },
      { State: 'Naujan', city: 'Del Pilar' },
      { State: 'Naujan', city: 'Estrella' },
      { State: 'Naujan', city: 'Evangelista' },
      { State: 'Naujan', city: 'Gamao' },
      { State: 'Naujan', city: 'General Esco' },
      { State: 'Naujan', city: 'Herrera' },
      { State: 'Naujan', city: 'Inarawan' },

      { State: 'Victoria', city: 'Alcate' },
      { State: 'Victoria', city: 'Antonino (Mainao)' },
      { State: 'Victoria', city: 'Babangonan' },
      { State: 'Victoria', city: 'Bagong Silang' },
      { State: 'Victoria', city: 'Bagong Buhay' },
      { State: 'Victoria', city: 'Bambanin' },
      { State: 'Victoria', city: 'Bethel' },
      { State: 'Victoria', city: 'Canaan' },
      { State: 'Victoria', city: 'Concepcion' },
      { State: 'Victoria', city: 'Duongan' },
      { State: 'Victoria', city: 'Leido' },
      { State: 'Victoria', city: 'Loyal' },
      { State: 'Victoria', city: 'Mabini' },
      { State: 'Victoria', city: 'Macatoc' },
      { State: 'Victoria', city: 'Malabo' },
      { State: 'Victoria', city: 'Merit' },
      { State: 'Victoria', city: 'Ordovilla' },
      { State: 'Victoria', city: 'Pakyas' },
      { State: 'Victoria', city: 'Poblacion I' },
      { State: 'Victoria', city: 'Poblacion II' },
      { State: 'Victoria', city: 'Poblacion III' },
      { State: 'Victoria', city: 'Poblacion IV' },
      { State: 'Victoria', city: 'Sampaguita' },
      { State: 'Victoria', city: 'San Antonio' },
      { State: 'Victoria', city: 'San Cristobal' },
      { State: 'Victoria', city: 'San Gabriel' },
      { State: 'Victoria', city: 'San Gelacio' },
      { State: 'Victoria', city: 'San Isidro' },
      { State: 'Victoria', city: 'San Juan' },
      { State: 'Victoria', city: 'San Narciso' },
      { State: 'Victoria', city: 'Urdaneta' },
      { State: 'Victoria', city: 'Villa Cerveza' },

      { State: 'Socorro', city: 'Epiz (Bagsok)' },
      { State: 'Socorro', city: 'Batong Dalig' },
      { State: 'Socorro', city: 'Bayuin' },
      { State: 'Socorro', city: 'Calocmoy' },
      { State: 'Socorro', city: 'Catiningan' },
      { State: 'Socorro', city: 'Villareal (Daan)' },
      { State: 'Socorro', city: 'La Fortuna (Putol)' },
      { State: 'Socorro', city: 'Happy Valley' },
      { State: 'Socorro', city: 'Calubayan' },
      { State: 'Socorro', city: 'Leuteboro I' },
      { State: 'Socorro', city: 'Leuteboro II' },
      { State: 'Socorro', city: 'Mabuhay I' },
      { State: 'Socorro', city: 'Malugay' },
      { State: 'Socorro', city: 'Matungao' },
      { State: 'Socorro', city: 'Monteverde' },
      { State: 'Socorro', city: 'Pasi I' },
      { State: 'Socorro', city: 'Pasi II' },
      { State: 'Socorro', city: 'Zone I (Pob.)' },
      { State: 'Socorro', city: 'Zone II (Pob.)' },
      { State: 'Socorro', city: 'Zone III (Pob.)' },
      { State: 'Socorro', city: 'Zone IV (Pob.)' },
      { State: 'Socorro', city: 'Santo Domingo (Lapog)' },
      { State: 'Socorro', city: 'Subaan' },
      { State: 'Socorro', city: 'Bugtong Na Tuog' },
      { State: 'Socorro', city: 'Mabuhay II' },
      { State: 'Socorro', city: 'Maria Concepcion' },

      { State: 'Pola', city: 'Bacawan' },
      { State: 'Pola', city: 'Bacungan' },
      { State: 'Pola', city: 'Batuhan' },
      { State: 'Pola', city: 'Bayanan' },
      { State: 'Pola', city: 'Biga' },
      { State: 'Pola', city: 'Buhay Na Tubig' },
      { State: 'Pola', city: 'Calima' },
      { State: 'Pola', city: 'Calubasanhon' },
      { State: 'Pola', city: 'Campamento' },
      { State: 'Pola', city: 'Casiligan' },
      { State: 'Pola', city: 'Malibago' },
      { State: 'Pola', city: 'Malauanluan' },
      { State: 'Pola', city: 'Matulatula' },
      { State: 'Pola', city: 'Misong' },
      { State: 'Pola', city: 'Pahilahan' },
      { State: 'Pola', city: 'Panikihan' },
      { State: 'Pola', city: 'Pula' },
      { State: 'Pola', city: 'Puting Cacao' },
      { State: 'Pola', city: 'Tagbakin' },
      { State: 'Pola', city: 'Tagumpay' },
      { State: 'Pola', city: 'Tiguihan' },
      { State: 'Pola', city: 'Zone I' },
      { State: 'Pola', city: 'Zone II' },

      { State: 'Pinamalayan', city: 'Anoling' },
      { State: 'Pinamalayan', city: 'Bacungan' },
      { State: 'Pinamalayan', city: 'Bangbang' },
      { State: 'Pinamalayan', city: 'Banilad' },
      { State: 'Pinamalayan', city: 'Buli' },
      { State: 'Pinamalayan', city: 'Cacawan' },
      { State: 'Pinamalayan', city: 'Calingag' },
      { State: 'Pinamalayan', city: 'Delrazon' },
      { State: 'Pinamalayan', city: 'Guinhawa' },
      { State: 'Pinamalayan', city: 'Inclanay' },
      { State: 'Pinamalayan', city: 'Lumambayan' },
      { State: 'Pinamalayan', city: 'Malaya' },
      { State: 'Pinamalayan', city: 'Maliancog' },
      { State: 'Pinamalayan', city: 'Maningcol' },
      { State: 'Pinamalayan', city: 'Marayos' },
      { State: 'Pinamalayan', city: 'Marfrancisco' },
      { State: 'Pinamalayan', city: 'Nabuslot' },
      { State: 'Pinamalayan', city: 'Pagalagala' },
      { State: 'Pinamalayan', city: 'Palayan' },
      { State: 'Pinamalayan', city: 'Pambisan Malaki' },
      { State: 'Pinamalayan', city: 'Pambisan Munti' },
      { State: 'Pinamalayan', city: 'Panggulayan' },
      { State: 'Pinamalayan', city: 'Papandayan' },
      { State: 'Pinamalayan', city: 'Pili' },
      { State: 'Pinamalayan', city: 'Quinabigan' },
      { State: 'Pinamalayan', city: 'Ranzo' },
      { State: 'Pinamalayan', city: 'Rosario' },
      { State: 'Pinamalayan', city: 'Sabang' },
      { State: 'Pinamalayan', city: 'Sta Isabel' },
      { State: 'Pinamalayan', city: 'Sta Maria' },
      { State: 'Pinamalayan', city: 'Sta Rita' },
      { State: 'Pinamalayan', city: 'Sto Nino' },
      { State: 'Pinamalayan', city: 'Wawa' },
      { State: 'Pinamalayan', city: 'Zone I' },
      { State: 'Pinamalayan', city: 'Zone II' },
      { State: 'Pinamalayan', city: 'Zone III' },
      { State: 'Pinamalayan', city: 'Zone IV' },

      { State: 'Gloria', city: 'Agsalin' },
      { State: 'Gloria', city: 'Agos' },
      { State: 'Gloria', city: 'Alma Villa' },
      { State: 'Gloria', city: 'Andres Bonifacio' },
      { State: 'Gloria', city: 'Balete' },
      { State: 'Gloria', city: 'Banus' },
      { State: 'Gloria', city: 'Banutan' },
      { State: 'Gloria', city: 'Buong Lupa' },
      { State: 'Gloria', city: 'Bulaklakan' },
      { State: 'Gloria', city: 'Gaudencio Antonino' },
      { State: 'Gloria', city: 'Guimbonan' },
      { State: 'Gloria', city: 'Kawit' },
      { State: 'Gloria', city: 'Lucio Laurel' },
      { State: 'Gloria', city: 'Macario Adriatico' },
      { State: 'Gloria', city: 'Malamig' },
      { State: 'Gloria', city: 'Malayong' },
      { State: 'Gloria', city: 'Maligaya' },
      { State: 'Gloria', city: 'Malubay' },
      { State: 'Gloria', city: 'Manguyang' },
      { State: 'Gloria', city: 'Maragooc' },
      { State: 'Gloria', city: 'Mirayan' },
      { State: 'Gloria', city: 'Narra' },
      { State: 'Gloria', city: 'Papandungin' },
      { State: 'Gloria', city: 'San Antonio' },
      { State: 'Gloria', city: 'Santa Maria' },
      { State: 'Gloria', city: 'Santa Theresa' },
      { State: 'Gloria', city: 'Tambong' },

      { State: 'Bansud', city: 'Alcadesma' },
      { State: 'Bansud', city: 'Bato' },
      { State: 'Bansud', city: 'Conrazon' },
      { State: 'Bansud', city: 'Malo' },
      { State: 'Bansud', city: 'Manihala' },
      { State: 'Bansud', city: 'Pag-asa' },
      { State: 'Bansud', city: 'Poblacion' },
      { State: 'Bansud', city: 'Proper Bansud' },
      { State: 'Bansud', city: 'Rosacara' },
      { State: 'Bansud', city: 'Salcedo' },
      { State: 'Bansud', city: 'Sumagui' },
      { State: 'Bansud', city: 'Proper Tiguisan' },
      { State: 'Bansud', city: 'Villa Pag-Asa' },

      { State: 'Bongabong', city: 'Anilao' },
      { State: 'Bongabong', city: 'Aplaya' },
      { State: 'Bongabong', city: 'Bagumbayan I' },
      { State: 'Bongabong', city: 'Bagumbayan II' },
      { State: 'Bongabong', city: 'Batangan' },
      { State: 'Bongabong', city: 'Camantigue' },
      { State: 'Bongabong', city: 'Bukal' },
      { State: 'Bongabong', city: 'Carmundo' },
      { State: 'Bongabong', city: 'Cawayan' },
      { State: 'Bongabong', city: 'Dayhagan' },
      { State: 'Bongabong', city: 'Formon' },
      { State: 'Bongabong', city: 'Hagan' },
      { State: 'Bongabong', city: 'Hagupit' },
      { State: 'Bongabong', city: 'Ipil' },
      { State: 'Bongabong', city: 'Kaligtasan' },
      { State: 'Bongabong', city: 'Labasan' },
      { State: 'Bongabong', city: 'Labonan' },
      { State: 'Bongabong', city: 'Libertad' },
      { State: 'Bongabong', city: 'Lisap' },
      { State: 'Bongabong', city: 'Luna' },
      { State: 'Bongabong', city: 'Malitbog' },
      { State: 'Bongabong', city: 'Mapang' },
      { State: 'Bongabong', city: 'Masaguisi' },
      { State: 'Bongabong', city: 'Mina de Oro' },
      { State: 'Bongabong', city: 'Morente' },
      { State: 'Bongabong', city: 'Ogbot' },
      { State: 'Bongabong', city: 'Orconuma' },
      { State: 'Bongabong', city: 'Poblacion' },
      { State: 'Bongabong', city: 'Pulosahi' },
      { State: 'Bongabong', city: 'Sagana' },
      { State: 'Bongabong', city: 'San Isidro' },
      { State: 'Bongabong', city: 'San Jose' },
      { State: 'Bongabong', city: 'San Juan' },
      { State: 'Bongabong', city: 'Santa Cruz' },
      { State: 'Bongabong', city: 'Sigange' },
      { State: 'Bongabong', city: 'Tawas' },

      { State: 'Roxas', city: 'Bagumbayan (Poblacion)' },
      { State: 'Roxas', city: 'Cantil' },
      { State: 'Roxas', city: 'Dangay' },
      { State: 'Roxas', city: 'Happy Valley' },
      { State: 'Roxas', city: 'Libertad' },
      { State: 'Roxas', city: 'Libtong' },
      { State: 'Roxas', city: 'Mabuhay' },
      { State: 'Roxas', city: 'Maraska' },
      { State: 'Roxas', city: 'Odiong' },
      { State: 'Roxas', city: 'Paclasan (Poblacion)' },
      { State: 'Roxas', city: 'San Aquilino' },
      { State: 'Roxas', city: 'San Isidro' },
      { State: 'Roxas', city: 'San Jose' },
      { State: 'Roxas', city: 'San Mariano' },
      { State: 'Roxas', city: 'San Miguel' },
      { State: 'Roxas', city: 'San Rafael' },
      { State: 'Roxas', city: 'San Vicente' },
      { State: 'Roxas', city: 'Uyao' },
      { State: 'Roxas', city: 'Victoria' },
      { State: 'Roxas', city: 'Little Tanauan' },

      { State: 'Mansalay', city: 'B Del Mundo' },
      { State: 'Mansalay', city: 'Balugo' },
      { State: 'Mansalay', city: 'Bonbon' },
      { State: 'Mansalay', city: 'Budburan' },
      { State: 'Mansalay', city: 'Cabalwa' },
      { State: 'Mansalay', city: 'Don Pedro' },
      { State: 'Mansalay', city: 'Maliwanag' },
      { State: 'Mansalay', city: 'Manaul' },
      { State: 'Mansalay', city: 'Panaytayan' },
      { State: 'Mansalay', city: 'Poblacion' },
      { State: 'Mansalay', city: 'Roma' },
      { State: 'Mansalay', city: 'Sta Brigida' },
      { State: 'Mansalay', city: 'Santa Maria' },
      { State: 'Mansalay', city: 'Villa Celestial' },
      { State: 'Mansalay', city: 'Wasig' },
      { State: 'Mansalay', city: 'Santa Teresita' },
      { State: 'Mansalay', city: 'Waygan' },

      { State: 'Bulalacao', city: 'Bagong Sikat' },
      { State: 'Bulalacao', city: 'Balatasan' },
      { State: 'Bulalacao', city: 'Benli (Mangyan Settlement)' },
      { State: 'Bulalacao', city: 'Cabugao' },
      { State: 'Bulalacao', city: 'Cambunang (Poblacion)' },
      { State: 'Bulalacao', city: 'Campaasan (Poblacion)' },
      { State: 'Bulalacao', city: 'Maasin' },
      { State: 'Bulalacao', city: 'Maujao' },
      { State: 'Bulalacao', city: 'Milagrosa (Guiob)' },
      { State: 'Bulalacao', city: 'Nasukob (Poblacion)' },
      { State: 'Bulalacao', city: 'Poblacion' },
      { State: 'Bulalacao', city: 'San Francisco (Alimawan)' },
      { State: 'Bulalacao', city: 'San Isidro' },
      { State: 'Bulalacao', city: 'San Juan' },
      { State: 'Bulalacao', city: 'San Roque (Buyayao)' },
    ];
   $(document).ready(function () {
      $("#dpdlProvince").change(function () {
          $("#dpdlCity").html("<option selected hidden>Select...</option>");
          $("#dpdlBarangay").html("<option selected hidden>Select...</option>");
          const states = stateList.filter(m => m.Country == $("#dpdlProvince").val());
          states.forEach(element => {
            const option = "<option val='" + element.State + "'>" + element.State + "</option>";
            $("#dpdlCity").append(option);
          });
        
      });

      $("#dpdlCity").change(function () {
          $("#dpdlBarangay").html("<option selected hidden>Select...</option>");
          const states = cityList.filter(m => m.State == $("#dpdlCity").val());
          states.forEach(element => {
            const option = "<option val='" + element.city + "'>" + element.city + "</option>";
            $("#dpdlBarangay").append(option);
          });
        });
      });
   $(document).ready(function () {
      $("#dpdlProvince1").change(function () {
          $("#dpdlCity1").html("<option selected hidden>Select...</option>");
          $("#dpdlBarangay1").html("<option selected hidden>Select...</option>");
          const states = stateList.filter(m => m.Country == $("#dpdlProvince1").val());
          states.forEach(element => {
            const option = "<option val='" + element.State + "'>" + element.State + "</option>";
            $("#dpdlCity1").append(option);
          });
        
      });

      $("#dpdlCity1").change(function () {
          $("#dpdlBarangay1").html("<option selected hidden>Select...</option>");
          const states = cityList.filter(m => m.State == $("#dpdlCity1").val());
          states.forEach(element => {
            const option = "<option val='" + element.city + "'>" + element.city + "</option>";
            $("#dpdlBarangay1").append(option);
          });
        });
      });
});
