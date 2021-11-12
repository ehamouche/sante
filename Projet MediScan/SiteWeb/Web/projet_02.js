function ChangerSection(){

    if(this.id=="nav_societe"){
    
      document.getElementById("societe").style.display ="block";
      document.getElementById("générateur").style.display ="none";
      document.getElementById("contact").style.display ="none";
      document.getElementById("carnet_de_santé").style.display ="none";
      document.getElementById("inscription").style.display ="none";
      document.getElementById("connexion").style.display ="none";
    }
    
    
    else if(this.id=="nav_générateur"){
    
      document.getElementById("societe").style.display ="none";
      document.getElementById("générateur").style.display ="block";
      document.getElementById("carnet_de_santé").style.display ="none";
      document.getElementById("inscription").style.display ="none";
      document.getElementById("connexion").style.display ="none";
    }
    
    
    else if(this.id=="nav_carnet"){
    
      document.getElementById("societe").style.display ="none";
      document.getElementById("générateur").style.display ="none";
      document.getElementById("carnet_de_santé").style.display ="block";
      document.getElementById("inscription").style.display ="none";
      document.getElementById("connexion").style.display ="none";
    
    }
    else if(this.id=="nav_inscription"){
    
      document.getElementById("societe").style.display ="none";
      document.getElementById("générateur").style.display ="none";
      document.getElementById("carnet_de_santé").style.display ="none";
      document.getElementById("inscription").style.display ="block";
      document.getElementById("connexion").style.display ="none";
    
    }
    else if(this.id=="nav_connexion"){
    
      document.getElementById("societe").style.display ="none";
      document.getElementById("générateur").style.display ="none";
      document.getElementById("carnet_de_santé").style.display ="none";
      document.getElementById("inscription").style.display ="none";
      document.getElementById("connexion").style.display ="block";
    
    }
    }
    document.getElementById("nav_societe").addEventListener("click",ChangerSection);
    document.getElementById("nav_générateur").addEventListener("click",ChangerSection);
    document.getElementById("nav_carnet").addEventListener("click",ChangerSection);
    document.getElementById("nav_inscription").addEventListener("click",ChangerSection);
    document.getElementById("nav_connexion").addEventListener("click",ChangerSection);
    