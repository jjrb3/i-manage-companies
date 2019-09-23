<?php


namespace App\Handlers\Company;


use App\Handlers\Company\Interfaces\CreateHandlerInterface;
use App\Repositories\Interfaces\EloquentCompanyRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Exception;

/**
 * Class CreateHandler
 * @package App\Handlers\Company
 */
class CreateHandler implements CreateHandlerInterface
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var EloquentCompanyRepositoryInterface
     */
    private $eloquentCompanyRepository;

    /**
     * GetListHandler constructor.
     * @param EloquentCompanyRepositoryInterface $eloquentCompanyRepository
     */
    public function __construct(EloquentCompanyRepositoryInterface $eloquentCompanyRepository)
    {
        $this->eloquentCompanyRepository = $eloquentCompanyRepository;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * @return \App\Models\Company|bool|mixed
     * @throws Exception
     */
    public function handle()
    {
        $companyParameters = $this->request->all();

        if ($fileName = $this->uploadImage()) {
            $companyParameters['logo'] = $fileName;
        }

        return $this->save($companyParameters);
    }

    /**
     * @return string|null
     */
    private function uploadImage(): ?string
    {
        if ($cover = $this->request->file('logo')) {

            $extension  = $cover->getClientOriginalExtension();
            $fileName   = $cover->getFilename() . '.' . $extension;

            Storage::disk('public')->put($fileName, File::get($cover));

            return $fileName;
        }

        return null;
    }

    /**
     * @param array $companyParameters
     * @return \App\Models\Company|bool
     * @throws Exception
     */
    private function save(array $companyParameters)
    {
        $company = $this->eloquentCompanyRepository->create($companyParameters);

        if (!isset($company->id)) {
            throw new Exception('Error');
        }

        return $company;
    }
}