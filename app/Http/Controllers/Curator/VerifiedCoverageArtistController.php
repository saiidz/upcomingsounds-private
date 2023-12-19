<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\Artist\VerifiedContentCreatorCurator;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifiedCoverageArtistController extends Controller
{
    /**
     * @var VerifiedContentCreatorCurator
     */
    private $verifiedContentCreatorCurator;

    /**
     * @param VerifiedContentCreatorCurator $verifiedContentCreatorCurator
     */
    public function __construct(VerifiedContentCreatorCurator $verifiedContentCreatorCurator)
    {
        $this->verifiedContentCreatorCurator = $verifiedContentCreatorCurator;
    }

    /**
     * @return Application|Factory|View
     */
    public function verifiedContentCreator()
    {
        $verifiedContentCreatorCurators = $this->verifiedContentCreatorCurator->where([
            'curator_id' => Auth::id(),
        ])->latest()->get();

        return view('pages.curators.verified-content-creator-artist.verified-content-creator', get_defined_vars());
    }

    /**
     * @param $verified_content_creator
     * @return Application|Factory|View
     */
    public function verifiedContentCreatorShow($verified_content_creator)
    {
        try {
            $verified_content_creator = $this->verifiedContentCreatorCurator->find(decrypt($verified_content_creator));
            return view('pages.curators.verified-content-creator-artist.verified-content-artist-details', get_defined_vars());
        }catch (DecryptException $exception)
        {
            abort('404','Not Found');
        }
    }
}
