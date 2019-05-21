import { Product } from './Product';
import { User } from './User';

export interface Commande {
    id: number;
    date_commande: Date;
    centre_livraison: string;
    total: number;
    produit: Product[];
    user: User;
}