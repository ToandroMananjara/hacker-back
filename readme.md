# pocketbase

# firebase

# instant db

# V0

# bolt

# Testeo ilay creation photo de profile miaraka amin ily miupload fichier amin ilay interface any fa tsy afaka mitest zah aty

- EndPoint : createProfilePhoto
- body : 'profilePhoto' type files
- methode : POST

* outPut : ['status' => 'success', 'message' => 'Photo de profil téléchargée avec succès.', 'photo_path' => $destination]

- EndPoint : createCoverPhoto
- body : 'coverPhoto' type files
- methode : POST

* outPut : ['status' => 'success', 'message' => 'Photo de couverture téléchargée avec succès.', 'photo_path' => $destination]

`

    interface Signalement {
        id: number;
        full_name: string;
        date: string;
        hour: string;
        location: string;
        description: string;
        file_path?: string;
        signature_path?: string;
    }

    interface Evaluation {
        id: number;
        signalement_id: number;
        comment?: string;
        clarity: number;
        effectiveness: number;
        response_time: number;
        empathy: number;
        created_at: string;
    }

    interface Complaint {
        id: number;
        current_status: string;
        date: string;
        description: string;
        priority: string;
        responsible_service: string;
    }

    interface TotalPlaintesResponse {
    total: number;
    }

    interface StatusPlaintesResponse {
    current_status: string;
    count: number;
    }

    interface RegionResponse {
    location: string;
    count: number;
    }

    interface TypeDeViolenceResponse {
    description: string;
    count: number;
    }

    interface StatsParJourResponse {
    jour: string;
    count: number;
    }

    interface TempsMoyenResponse {
    temps_moyen: number; // Adjust based on actual API response
    }

Voici une explication détaillée des routes et des contrôleurs définis dans votre tableau de mappage des routes :

---

### **Routes pour les utilisateurs (`users`)**

1. **`users`** :

   - **Controller** : `user`
   - **Action** : `index`
   - **Description** : Affiche la liste des utilisateurs.

2. **`users/create`** :

   - **Controller** : `user`
   - **Action** : `createUser`
   - **Description** : Permet de créer un nouvel utilisateur.

3. **`users/delete`** :

   - **Controller** : `user`
   - **Action** : `deleteUser`
   - **Description** : Supprime un utilisateur existant.

4. **`users/update`** :
   - **Controller** : `user`
   - **Action** : `updateUser`
   - **Description** : Met à jour les informations d’un utilisateur.

---

### **Routes pour les publications (`posts`)**

1. **`posts`** :

   - **Controller** : `post`
   - **Action** : `index`
   - **Description** : Affiche toutes les publications.

2. **`posts/create`** :

   - **Controller** : `post`
   - **Action** : `createPost`
   - **Description** : Crée une nouvelle publication.

3. **`posts/delete`** :

   - **Controller** : `post`
   - **Action** : `deletePost`
   - **Description** : Supprime une publication.

4. **`posts/update`** :
   - **Controller** : `user` (probablement une erreur, devrait être `post`).
   - **Action** : `updatePost`
   - **Description** : Met à jour une publication existante.

---

### **Routes pour l'authentification**

1. **`signIn`** :

   - **Controller** : `signIn`
   - **Action** : `authenticate`
   - **Description** : Authentifie un utilisateur.

2. **`signUp`** :

   - **Controller** : `signUp`
   - **Action** : `index`
   - **Description** : Gère l'inscription des utilisateurs.

3. **`logout`** :
   - **Controller** : `deconnexion`
   - **Action** : `logout`
   - **Description** : Déconnecte un utilisateur.

---

### **Routes pour les interactions**

1. **`react`** :

   - **Controller** : `reactPost`
   - **Action** : `reactPost`
   - **Description** : Permet de réagir à une publication.

2. **`emotion`** :
   - **Controller** : `emotionController`
   - **Action** : `index`
   - **Description** : Gère les types d'émotions disponibles.

---

### **Routes pour les commentaires**

1. **`comment/create`** :

   - **Controller** : `commentController`
   - **Action** : `addComment`
   - **Description** : Ajoute un commentaire à une publication.

2. **`comment/delete`** :

   - **Controller** : `commentController`
   - **Action** : `deleteComment`
   - **Description** : Supprime un commentaire existant.

3. **`comment/react`** :
   - **Controller** : `reactCommentController`
   - **Action** : `reactComment`
   - **Description** : Réagit à un commentaire (par exemple, liker un commentaire).

---

### **Routes pour les pages statiques**

1. **`about`** :

   - **Controller** : `aboutController`
   - **Action** : `index`
   - **Description** : Affiche la page "À propos".

2. **`about/create`** :

   - **Controller** : `aboutController`
   - **Action** : `createAbout`
   - **Description** : Ajoute une nouvelle section dans "À propos".

3. **`about/update`** :
   - **Controller** : `aboutController`
   - **Action** : `updateAbout`
   - **Description** : Met à jour une section existante dans "À propos".

---

### **Routes pour le profil et les photos**

1. **`profile`** :

   - **Controller** : `profileController`
   - **Action** : `index`
   - **Description** : Affiche les informations de profil de l'utilisateur.

2. **`createProfilePhoto`** :

   - **Controller** : `profilePhotoController`
   - **Action** : `createProfilePhoto`
   - **Description** : Permet d'ajouter une photo de profil.

3. **`createCoverPhoto`** :
   - **Controller** : `coverPhotoController`
   - **Action** : `createCoverPhoto`
   - **Description** : Permet d'ajouter une photo de couverture.

---

### **Routes pour les notifications**

1. **`notifications`** :

   - **Controller** : `notificationController`
   - **Action** : `getNotifications`
   - **Description** : Récupère les notifications de l'utilisateur.

2. **`notifications/markAsRead`** :

   - **Controller** : `notificationController`
   - **Action** : `markAsRead`
   - **Description** : Marque les notifications comme lues.

3. **`notifications/count`** :
   - **Controller** : `notificationController`
   - **Action** : `countUnread`
   - **Description** : Compte le nombre de notifications non lues.

---

### **Routes pour les relations utilisateurs**

1. **`user/follow`** :

   - **Controller** : `followerController`
   - **Action** : `follow`
   - **Description** : Permet de suivre un utilisateur.

2. **`user/unfollow`** :

   - **Controller** : `followerController`
   - **Action** : `unfollow`
   - **Description** : Permet de se désabonner d'un utilisateur.

3. **`user/allfriend`** :
   - **Controller** : `followerController`
   - **Action** : `allFriend`
   - **Description** : Affiche tous les amis d'un utilisateur.

---

### **Routes pour d'autres fonctionnalités**

1. **`signalement`** :

   - **Controller** : `signalementController`
   - **Action** : `index`
   - **Description** : Gère les signalements faits par les utilisateurs.

2. **`evaluation`** :

   - **Controller** : `evaluationController`
   - **Action** : `index`
   - **Description** : Gère les évaluations ou les notes attribuées par les utilisateurs.

3. **`complaint`** :
   - **Controller** : `complaintController`
   - **Action** : `index`
   - **Description** : Gère les plaintes ou réclamations faites par les utilisateurs.

---

### Résumé

Le code présente un système de gestion des routes bien structuré. Il couvre une large gamme de fonctionnalités, y compris la gestion des utilisateurs, des publications, des commentaires, des réactions, des profils, des notifications, et bien plus. Cependant, il faudrait corriger certaines incohérences, comme la route `posts/update` qui pointe vers le contrôleur `user` au lieu de `post`.
