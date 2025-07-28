<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will bea
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = service('session');
        $uri = $request->getUri();
        $currentPath = $uri->getPath();
        
        // Check if user is logged in (regular user)
        $isLoggedIn = $session->has('isLoggedIn') && $session->get('isLoggedIn');
        
        // Check if admin is logged in
        $isAdminLoggedIn = $session->has('isAdminLoggedIn') && $session->get('isAdminLoggedIn');
        
        // Determine if any user (regular or admin) is authenticated
        $isAuthenticated = $isLoggedIn || $isAdminLoggedIn;
        
        // Handle different filter types based on arguments
        if (!empty($arguments)) {
            $filterType = $arguments[0];
            
            switch ($filterType) {
                case 'guest':
                    // Guest-only pages (login, register) - redirect authenticated users
                    if ($isAuthenticated) {
                        if ($isAdminLoggedIn) {
                            return redirect()->to('/admin/dashboard');
                        } else {
                            // Redirect regular users to the main dashboard
                            return redirect()->to('/dashboard');
                        }
                    }
                    break;
                    
                case 'auth':
                    // Authenticated pages - redirect unauthenticated users to login
                    if (!$isAuthenticated) {
                        // Check if it's an admin route
                        if (strpos($currentPath, '/admin') === 0) {
                            return redirect()->to('/admin/login');
                        } else {
                            return redirect()->to('/login');
                        }
                    }
                    break;
                    
                case 'admin':
                    // Admin-only pages - redirect non-admin users
                    if (!$isAdminLoggedIn) {
                        if ($isLoggedIn) {
                            // Regular user trying to access admin area
                            return redirect()->to('/login')->with('error', 'Access denied. Admin privileges required.');
                        } else {
                            // Unauthenticated user
                            return redirect()->to('/admin/login');
                        }
                    }
                    break;
                    
                case 'user':
                    // Regular user pages - redirect admin or unauthenticated users
                    if (!$isLoggedIn) {
                        if ($isAdminLoggedIn) {
                            // Admin trying to access user area
                            return redirect()->to('/admin/dashboard')->with('error', 'Please use admin interface.');
                        } else {
                            // Unauthenticated user
                            return redirect()->to('/login');
                        }
                    }
                    break;
            }
        }
        
        return $request;
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return $response;
    }
}
