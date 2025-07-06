import { Page } from '@inertiajs/core';
import { AxiosInstance } from 'axios';
import { route as ziggyRoute } from 'ziggy-js';

declare global {
    // Mendeklarasikan fungsi route() dan axios secara global
    const route: typeof ziggyRoute;
    const axios: AxiosInstance;
}

declare module 'vue' {
    // Menambahkan properti route ke dalam komponen Vue
    interface ComponentCustomProperties {
        route: typeof ziggyRoute;
    }
}

declare module '@inertiajs/core' {
    // Menambahkan tipe untuk properti 'auth' yang dikirim dari Laravel
    interface PageProps {
        auth: {
            user: {
                id: number;
                name: string;
                email: string;
                // Tambahkan properti lain jika ada, misalnya is_admin
                is_admin?: boolean;
            };
        };
    }
}
