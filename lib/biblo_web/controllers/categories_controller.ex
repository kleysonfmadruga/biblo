defmodule BibloWeb.CategoriesController do
  @moduledoc false

  use BibloWeb, :controller

  alias Biblo.Category

  action_fallback BibloWeb.FallbackController

  def create(conn, params) do
    with {:ok, %Category{} = category} <- Biblo.create_category(params) do
      conn
      |> put_status(:created)
      |> render("create.json", category: category)
    end
  end

  defp handle_response({:error, _result} = error, _conn), do: error
end
