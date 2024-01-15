<?php

namespace App\Repositories\Location\Province;

use App\Models\Province;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Location\Province\ProvinceRepository;
use App\Validators\Location\Province\ProvinceValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

/**
 * Class ProvinceRepositoryEloquent.
 *
 * @package namespace App\Repositories\Location\Province;
 */
class ProvinceRepositoryEloquent extends BaseRepository implements ProvinceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */

    public function model()
    {
        return Province::class;
    }


    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    public function getDistrictsByProvinceId($province_id)
    {
        try {
            $province = $this->model->findOrFail($province_id);
            $districts = $province->districts()->get(['id', 'name']);
            return response()->json(['districts' => $districts], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Tỉnh không tồn tại.'], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
