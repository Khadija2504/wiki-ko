# **Wiki Content Management System**

## **Description**
The **Wiki Content Management System** is a dynamic and collaborative platform designed to allow authors and administrators to manage wikis effectively while providing users an exceptional front-office experience. This project follows an **MVC (Model-View-Controller)** architecture using **PHP 8** and includes a robust backend for content organization and a dynamic frontend for seamless navigation.

---

## **Table of Contents**
1. [Features](#features)
2. [Technologies Used](#technologies-used)
3. [Project Structure](#project-structure)
4. [Installation](#installation)
5. [Usage](#usage)
6. [Bonus Features](#bonus-features)

---

## **Features**

### **Back Office**
- **Gestion des Catégories (Admin)**  
   - Créer, modifier et supprimer des catégories.  
   - Associer plusieurs wikis à une catégorie.  

- **Gestion des Tags (Admin)**  
   - Créer, modifier et supprimer des tags.  
   - Associer des tags aux wikis pour améliorer la recherche.  

- **Inscription des Auteurs**  
   - Les auteurs peuvent s'inscrire avec un nom, email et mot de passe sécurisé.  

- **Gestion des Wikis (Auteurs et Admins)**  
   - Auteurs: Créer, modifier et supprimer leurs propres wikis.  
   - Associer une catégorie et plusieurs tags à un wiki.  
   - Admins: Archiver les wikis inappropriés.  

- **Tableau de bord**  
   - Consultation des statistiques des entités via un tableau de bord.

### **Front Office**
- **Login & Register**  
   - Enregistrement et connexion des utilisateurs.  
   - Redirection basée sur le rôle (Admin → Dashboard, Auteur → Page d'accueil).  

- **Barre de Recherche**  
   - Recherche dynamique sans rechargement de page grâce à **AJAX**.  

- **Affichage des Derniers Wikis**  
   - Section dédiée pour afficher les derniers wikis ajoutés.  

- **Affichage des Dernières Catégories**  
   - Présentation des dernières catégories créées/mises à jour.  

- **Page Détail du Wiki**  
   - Redirection vers une page dédiée affichant le contenu complet, les tags, la catégorie et l'auteur.  

---

## **Technologies Used**
### **Frontend**
- HTML5  
- CSS Framework (e.g., Bootstrap, Tailwind)  
- JavaScript  

### **Backend**
- PHP 8  
- **PDO** Driver for Database Operations  

### **Database**
- MySQL  

### **Architecture**
- **MVC** (Model-View-Controller)  
- **Namespace Autoloading** for class organization  

