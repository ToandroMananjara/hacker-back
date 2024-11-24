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
