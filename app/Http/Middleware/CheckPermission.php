<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $requiredPermission): Response
    {
        $user = Auth::user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // Ambil role user
        $roleId = $user->role_id;

        // Ambil permission yang dihandle oleh role tsb
        $permissions = DB::table('role_permissions')
            ->join('roles', 'role_permissions.role_id', '=', 'roles.id')
            ->join('permissions', 'role_permissions.permission_id', '=', 'permissions.id')
            ->where('roles.id', $roleId)
            ->pluck('permissions.handle_access')
            ->toArray();

        // Cek apakah permission yg diminta tersedia
        if (!in_array($requiredPermission, $permissions)) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}
