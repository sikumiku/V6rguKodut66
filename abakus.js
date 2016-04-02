window.onload = function() {

	var p2rlid = document.getElementsByClassName('bead');

	function liigutaP2rl(p2rl) {

	    if (p2rl.target.style.cssFloat == "left") {
	    	p2rl.target.style.cssFloat = "right"; 
	    } else {
	    	p2rl.target.style.cssFloat = "left"; 
	    }
	}

	for (var i = 0; i < p2rlid.length; i++) {
		p2rlid[i].onclick = liigutaP2rl;
	}$(zz)
}