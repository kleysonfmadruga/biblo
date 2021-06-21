defmodule Biblo.Categories.Create do
  @moduledoc false

  alias Ecto.Multi
  alias Biblo.{Repo, Category}

  def call(params) do
    Multi.new()
    |> Multi.insert(:create_category, Category.changeset(params))
    |> run_transaction()
  end

  defp run_transaction(multi) do
    case Repo.transaction(multi) do
      {:error, _operation, reason, _changes} -> {:error, reason}
      {:ok, %{create_category: category}} -> {:ok, category}
    end
  end
end
