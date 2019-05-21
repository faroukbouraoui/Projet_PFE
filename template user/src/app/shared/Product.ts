import { Fournisseur } from './Fournisseur';

export interface Product {
    id: number;
    designation: string;
    description: string;
    image: string;
    fournisseur : Fournisseur;
    prix: number;
}