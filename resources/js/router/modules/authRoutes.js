import LoginComponent from "../../components/frontend/auth/LoginComponent";
import ForgotPasswordComponent from "../../components/frontend/auth/ForgotPasswordComponent";
import ForgotPasswordVerifyComponent from "../../components/frontend/auth/ForgotPasswordVerifyComponent";
import ResetPasswordComponent from "../../components/frontend/auth/ResetPasswordComponent";

export default [
    {
        path: '/login',
        component: LoginComponent,
        name: 'auth.login',
        meta: {
            isFrontend: true,
            auth: false
        }
    },
    {
        path: '/forgot-password',
        component: ForgotPasswordComponent,
        name: 'auth.forgotPassword',
        meta: {
            isFrontend: true,
            auth: false
        }
    },
    {
        path: '/forgot-password/verify',
        name: 'auth.forgotPasswordVerify',
        component: ForgotPasswordVerifyComponent,
        meta: {
            isFrontend: true,
            auth: false
        }
    },
    {
        path: '/forgot-password/reset-password',
        name: 'auth.resetPassword',
        component: ResetPasswordComponent,
        meta: {
            isFrontend: true,
            auth: false
        }
    },

];
